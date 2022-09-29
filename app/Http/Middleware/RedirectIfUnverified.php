<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class RedirectIfUnverified
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if (
      !$request->user() 
      ||
      ($request->user() instanceof MustVerifyEmail &&
        $request->user()->hasVerifiedEmail())
    ) {
      // dd($request->user());
      return $request->expectsJson()
      ? abort(403, 'Your email address has verified.')
      : back();
    }
    // dd($request->user());
    return $next($request);
  }
}
