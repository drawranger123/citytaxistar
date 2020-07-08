<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Contracts\Session\Session;
use App\Helpers\CommonHelper;
use Auth;
use App;

use Illuminate\Support\Facades\DB;



class AdminController extends BaseController
{
	private $isAPI;
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function __invoke(Request $request)
	{

	}

	public function verify(Request $request)
 	{
        //echo "Welcome";
		$username = $request->input('username');
		$password = $request->input('password');
        //echo $password.":".Hash::make($password);
		
		if (Auth::attempt(['name' => $username, 'password' => $password]))
        {
			// echo "Ok";
			// $request->session()->put('name', $username);
			//echo $request->session()->get('name');
			//  return redirect()->intended('manager/dashboard");                                                                                                                                                                ');

			//id	user_id	ip_address	user_agent	payload	last_activity
			// DB::table('sessions')->insert([
			// 	['user_id' => $username, 'ip_address' => $_SERVER['HTTP_CLIENT_IP'], 'user_agent' => 'taylor@example.com', 'enter_dt' => date("Y-m-d H:i:s"),  'payload' => 0, 'last_activity' => 0]				
			// ]);
		
		 	return redirect()->intended('manager/dashboard');
        }else{
            return redirect()->intended('?error=1');
        }

	}

}
