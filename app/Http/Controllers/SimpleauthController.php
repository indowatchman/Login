<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Mail;

class SimpleauthController extends Controller
{
    //
    public function register()
    {
    	return View('registration.registration');
    }

    public function doRegister(RegistrationRequest $request)
    {
    	$input = $request->all();
    	$password = bcrypt($request->input('password'));
  		$input['password'] = $password;
  		$input['activation_code'] = str_random(60) . $request->input('email');
  		$register = User::create($input);

  		$data = [
  			'name' => $input['name'],
  			'code' => $input['activation_code']
  		];
  		$this->sendEmail($data, $input);
  		return redirect()->route('home');
	}

	public function sendEmail($data, $input)
	{
		Mail::send('emails.register', $data, function($message) use ($input) {

		$message->from('team@laravel-indonesia.com', 'Laravel-indonesia');
		$message->to($input['email'], $input['name'])->subject('Please verify your account registration!');
		});
	}

	public function activate($code, User $user)
	{
		if ($user->activateAccount($code)) {
			return 'Activated!';
		}
		return 'Fail';
	}

  public function login()
  {
    return View('home.login');
  }

  public function ceklogin(LoginRequest $request)
  {
    $credentials = $request->only('email', 'password');
    if(Auth::attempt($credentials)){
 
      if (Auth::user()->active == 0) {
        Auth::logout();
        return 'Please activate your account';
      }
      else{
        return redirect('/home');
      }
    }
    else{
      return redirect('/login')->with('pesan_error', 'Login gagal, email atau password salah!');
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }

}
