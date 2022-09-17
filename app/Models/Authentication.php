<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class Authentication extends Model{

    public function getlog($request)
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

    public function getlogs()
    {
        $users = DB::table('FNLogSys')//->get();
                    ->whereDate('SysDate',date("Y-m-d"))
                    ->get();
        return ['data' => $users];
        //return $users;
    }

    public function getCompany(){
        $result = DB::table('TCNMComp')->get();
        return $result;
    }

    public function getuser()
    {
        $users = DB::table('TSysUser')//->get();
                    ->select('FTUsrCode','FTUsrName','FTDptCode')
                    //->where('FTDptCode','!=','099')
                    ->get();
        return ['data' => $users];
        //return $users;
    }

    public function getUsrData($request){
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

    public function getUsrDetail($FTUsrCode){
        $result=DB::table('TSysUser')
                ->where('FTUsrCode',$FTUsrCode)
                ->get();
        // $result=DB::select("select *
        //     From TSysUser
        //     WHERE FTUsrCode='$FTUsrCode'");
        return $result;
    }

    public function updatePassword($request){
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

    public function getPermissionMenu($usrCode){
        $result = DB::table('TSysUserMenu')
                    ->select('FTMnuOrder','TSysMenu.FTMnuName','FTMnuThaDesc','FTMnuEngDesc','FNMnuVisible')
                    ->join('TSysMenu', 'TSysUserMenu.FTMnuName', '=', 'TSysMenu.FTMnuName')
                    ->where('FTUsrCode',$usrCode)
                    ->where('TSysMenu.FTMnuOrder','like','FN%')
                    ->orderBy('FTMnuLevel','FTMnuOrder')
                    ->get();
        if($result->isEmpty()){
            return False;
        }else{
            return $result;
        }
        // $return = DB::Select("
        // select FTMnuOrder,TSysMenu.FTMnuName,FTMnuThaDesc,FTMnuEngDesc,FNMnuVisible
        // from TSysUserMenu
        // join TSysMenu on TSysUserMenu.FTMnuName=TSysMenu.FTMnuName
        // where FTUsrCode='$usrCode'
        // and TSysMenu.FTMnuOrder  like 'FN%'
        // order by FTMnuLevel,FTMnuOrder");

        // return $return;
    }

    public function updateHashPassword($request)
    {
        $password = $request['password']; // get the value of password field
        $hashed = Hash::make($password); // encrypt the password
        return $hashed;
    }
}
