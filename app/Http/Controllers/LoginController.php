<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests;

class LoginController extends Controller
{
	public function __construct(){
		
	}

	// Display login page view
	public function index(Request $request){
		if(!empty($request->toArray())){
			$data = $request->toArray();
		}else{
			$data['route'] = '';
		}
		
		return view('login.login',$data);
	}

	// Display register page view
	public function register(){
		return view('login.register');
	}

	// Authenticate user
	public function auth(Request $request){
		$request_array = $request->toArray();
		$admin = Admin::where(array('admin_email' => $request_array['admin_email'],'admin_email' => $request_array['admin_email']))->first()->toArray();
		
		$request->session()->put('id', $admin['id']);
		$request->session()->put('admin_email', $admin['admin_email']);



		if(isset($request_array['route']) && !empty($request_array['route']) && $request_array['route'] != '/'){
			return redirect($request_array['route']);
		}else{
			return redirect('dashboard');	
		}

		
	}

	public function createMember(Request $request){

	}

	public function logout(Request $request){
		$request->session()->flush();
		return redirect('login');
	}
}
