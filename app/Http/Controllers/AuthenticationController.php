<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Authentication;
use Illuminate\Support\Facades\Session;
use Validator;
class AuthenticationController extends Controller{

   	public function index(){
   		return view('Authentication.login');
    }

	public function Authenticated(Request $request){
		$Authen = new Authentication();
        $comp = $Authen->getCompany();
        if($comp!= false){
           foreach($comp as $row);
            session([
                'Bchcode' => $row->FTBchCode,
                'BchName' => $row->FTCmpName
            ]);
            // session::put('Bchcode',$row->FTBchCode);
            // session::put('BchName',$row->FTCmpName);
        }
	    $result = $Authen->getUsrData($request->all());
        if($result){
            $data['status'] = true;
            $data['data']   = $result;

            foreach($result as $row);
            session([
                'FTUsrCode' => $row->FTUsrCode,
                'FTUsrName' => $row->FTUsrName,
                'FNUsrLevel'=> $row->FNUsrLevel,
                'UsrName'   => $row->FTUsrName,
                'UsrCode'   => $row->FTUsrCode
            ]);
			// Session::put('FTUsrCode',$row->FTUsrCode);
	    	// Session::put('FTUsrName', $row->FTUsrName);
	    	// Session::put('FNUsrLevel', $row->FNUsrLevel);
            // Session::put('UsrName', $row->FTUsrName);
            // Session::put('UsrCode',$row->FTUsrCode);
	    	$permission = $Authen->getPermissionMenu($row->FTUsrCode);
             	if(count($permission) > 0){
                    foreach($permission as $row){
                        return redirect($row->FTMnuName);
                    }
                }else{
                    return redirect('/')
                    ->with('class','alert-aquamarine')
                    ->with('status','ข้อมูลผู้ใช้ยังไม่ได้กำหนดสิทธิ์การใช้งาน ! ');
                }
        }else{

            $data['status'] = false;
            $data['data']   = $result;
            return redirect('/login')
		    ->with('class','alert-danger')
		    ->with('status','ไม่พบข้อมูลผู้ใช้งาน กรุณาตรวจสอบข้อมูล !');
        }
        echo json_encode($data);
	    // if($result != False){


		// }else{

		// }
	}

   	public function Logout(Request $request){
   		$request->session()->flush();
   		return redirect('/');
   	}

	public function getDataUser(){
   		$Authen = new Authentication();
   		$FTUsrCode = Session::get('FTUsrCode');
	    $result = $Authen->getUsrDetail($FTUsrCode);
	    foreach($result as $row){
            $data = array(
                "FTUsrName" => $row->FTUsrName,
                "FTUsrPass" => $row->FTUsrAddr
            );
        }
        echo json_encode($data);
   	}

   	public function updatePassword(Request $request){
	  	$Authen = new Authentication();
	    $result = $Authen->updatePassword($request->all());
	    if($result != False){
	    	$status = array("status"=>'success');
		}else{
			$status = array("status"=>'error');
		}
		echo json_encode($status);
	}

    public function getlog(Request $request){
        $U = new Authentication();
        $U ->getlog($request->all());
        return response()->json(['data'=>'200']);

    }

    public function getlogs(){
        $U = new Authentication();
        $data = $U ->getlogs();
        return response()->json(['status'=>'200','data'=>$data]);
    }

    public function getuser(){
        $U = new Authentication();
        $data = $U ->getuser();
        return response()->json(['data'=>$data]);
    }

    public function HPassword(Request $request)
    {
        $U = new Authentication();
        $result = $U ->updateHashPassword($request->all());
        if($result){
            $data['data'] = $result;
        }
        echo json_encode($data);
    }

}
