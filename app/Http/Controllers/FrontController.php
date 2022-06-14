<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;

class FrontController extends Controller
{
  function loginIndex()
  {
    return view('pages.front.login');
  }

  function doLogin(Request $req)
  {
    $validator = Validator::make($req->all(), [
			'username'	=> 'required',
			'password' => 'required'
		]);

		if ($validator->fails()) {
			return response()->json(['errors'=>$validator->errors()],422);
		}

    $remember = false;
		if ($req->remember == 1){
			$remember = true;
		}
		if (Auth::attempt(['username'=>$req->username,'password'=>$req->password],$remember)) {
      return response(['error'=>false,'message'=>'Login Berhasil']);
    } else {
        return response(['error'=>true,'message'=>'Username atau password salah']);
    }
  }

  function doLogout(Request $req)
  {
    $user = Auth::user();
		@User::where('id',$user->id)->update(['remember_token'=>'']);
		$req->session()->flush();
    return redirect('login');
  }
}
