<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVerificationController extends Controller
{
  // Route::get('/email/verify', function () {
  //   return view('auth.verify-email');
  // })->middleware('auth')->name('verification.notice');
  public function verificationNotice()
  {
    return view('auth.verify-email', [
      'user' => Auth::user()
    ]);
  }

  // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//   $request->fulfill();
//   return redirect('/');
// })->middleware(['auth', 'signed'])->name('verification.verify');
  public function verificationVerify(EmailVerificationRequest $request)
  {
    $request->fulfill();
    return redirect('/');
  }

  // Route::post('/email/verification-notification', function (Request $request) {
//   $request->user()->sendEmailVerificationNotification();
//   return back()->with('message', 'Verification link sent!');
// });

  public function verificationSend(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link has been sent!');
  }
}
