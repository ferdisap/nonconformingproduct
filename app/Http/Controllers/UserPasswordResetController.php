<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserPasswordResetController extends Controller
{
  public function requestLink()
  {
    // Route::get('/forgot-password', function () {
    //   return view('auth.forgot-password');
    // })->middleware('guest')->name('password.request');
    return view('auth.forgot-password');
  }

  public function sendLink(Request $request)
  {
    $request->validate(['email' => 'required|email']); // validasi ini tidak perlu cek email apakah exist in table users or not, karena ada authentication systems's "user providers", see in  config\auth.php 
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)])->onlyInput('email');
  }
  
  public function resetPassword($token, Request $request)
  {
    return view('auth.reset-password', [
      'token' => $token, // token ini disimpan di tabel password_resets, token akan dikirimkan ke user pada method sendLink() diatas supaya tidak semua user bisa reset password, dan ada jeda waktu bagi user untuk request reset password lagi
      'email' => $request->email,
    ]);
  }

  public function updatePassword(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'token' => 'required', // token dan email tidak peru di validasi exists di database lagi, karena ada authentication systems's "user providers", see in  config\auth.php 
      'email' => 'required|email',
      'password' => 'required|min:8|confirmed',
      // 'pasword_confirmation' =>'required',
    ]);

    if ($validator->fails()){
      return back()->withErrors($validator);
    }

    // $validator tidak perlu di validasi karena password::reset menggunakan $request saja

    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function ($user, $password) {
          $user->forceFill([
              'password' => Hash::make($password)
          ])->setRememberToken(Str::random(60));

          $user->save();

          event(new PasswordReset($user));
      }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', __($status))
        : back()->withErrors([
          'email' => [__($status)],                  
        ]);
  }

  public function changePassword()
  {
    return view('auth.change-password');
  }



}
