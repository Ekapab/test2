<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class Authentication extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'TSysUser';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'FTUsrCode';


    public static function getlog($request)
    {
        $dt = Carbon::now(("Asia/Bangkok"));
        DB::table('FNLogSys')->insert([
            'Bchcode'   =>$request['Bchcode'],
            'SysDate'   => date("Y-m-d"),
            'SysTime'   => $dt->toTimeString(),
            'SysUser'   => $request['Usr'],
            'SysUrl'    => $request['url']
        ]);
    }

    public static function getlogs()
    {
        $users = DB::table('FNLogSys')//->get();
                    ->whereDate('SysDate',date("Y-m-d"))
                    ->get();
        return ['data' => $users];
        //return $users;
    }

    public static function getCompany(){
        $result = DB::table('TCNMComp')->get();
        return $result;
    }

    public static function getuser()
    {
        $users = DB::table('TSysUser')//->get();
                    ->select('FTUsrCode','FTUsrName','FTDptCode')
                    //->where('FTDptCode','!=','099')
                    ->get();
        return ['data' => $users];
        //return $users;
    }

    public static function getUsrData($request){
        $result = DB::table('TSysUser')
                    ->where('FTUsrCode',$request['FTUsrCode'])
                    ->where('FTUsrAddr',$request['FTUsrPass'])
                    ->get();
		if($result->isEmpty()){
            return False;
        }else{
            return $result;
        }
        //return $result;
    }

    public static function getUsrDetail($FTUsrCode){
        $result=DB::table('TSysUser')
                ->where('FTUsrCode',$FTUsrCode)
                ->get();
        // $result=DB::select("select *
        //     From TSysUser
        //     WHERE FTUsrCode='$FTUsrCode'");
        return $result;
    }

    public static function updatePassword($request){
        $affected = DB::table('TSysUser')
              ->where('FTUsrCode', $request['usrcode'])
              ->update([
                'FTUsrAddr' => $request['password']
            ]);

        return true;
        // if(DB::update("update TSysUser
        //       set FTUsrAddr='".$request['password']."'
        //       where FTUsrCode = '".$request['usrcode']."'")){
        //     return  TRUE;
        // }else{
        //     return  FALSE;
        // }
    }

    public static function getPermissionMenu($usrCode){
        $result = DB::table('TSysUserMenu')
                    ->select('FTMnuOrder','TSysMenu.FTMnuName','FTMnuThaDesc','FTMnuEngDesc','FNMnuVisible')
                    ->join('TSysMenu', 'TSysUserMenu.FTMnuName', '=', 'TSysMenu.FTMnuName')
                    ->where('FTUsrCode',$usrCode)
                    ->where('TSysMenu.FTMnuOrder','like','FN%')
                    ->orderBy('FTMnuLevel','asc')
                    ->orderBy('FTMnuOrder','asc')
                    ->get();
        if($result->isEmpty()){
            return False;
        }else{
            return $result;
        }
    }

    public static function updateHashPassword($request)
    {
        $password = $request['password']; // get the value of password field
        $hashed = Hash::make($password); // encrypt the password
        return $hashed;
    }

}
