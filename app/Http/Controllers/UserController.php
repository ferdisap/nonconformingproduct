<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return route()
      return 'fooIndex';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return 'fooCreate';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $validated = $request->validate([
      //   'name' => 'required',
      //   'username' => 'required|unique:users,username|digits_between:6,8|max:255',
      //   'email' => 'required|email:rfc,strict,filter|unique:users',
      //   'password' => ['required', Password::min(8)],
      // ]);

      // $validated['password'] = bcrypt($validated['password']);
      // User::create($validated);

      // return redirect('/login')->with('success', 'Registration success, check your email for verification');

      
      // return redirect('/login')->with('success', 'Registration success, check your email for verification');

      // return $request->all();

      $validator = Validator::make($request->all(), [
        'name' => ['required', 'max:255'],
        // 'username' => 'required|unique:users,username|min:3|max:8',
        'username' => 'required',
        // 'email' => 'required|email:rfc,strict,filter|unique:users',
        'email' => 'required',
        'password' => ['required'],
      ]);

      
      if ($validator->fails()) {        
        return redirect('/register')->withErrors($validator)->withInput();

      } else {
        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);
        $validated['remember_token'] = Str::random(10);
        // $validated['email_verified_at'] = null;
  
        $user = User::create($validated);

        // user tidak bisa login jika belum verifikasi
        event(new Registered($user));
        return redirect('/login')->with('success', 'Registration success, check your email for verification');

        // dibawah ini, bisa login walau belum di verifikasi
        // Auth::login($user);
        // event(new Registered(Auth::user()));
        // return redirect('/email/verify');

  
        // $request->session()->flash('success', 'Registration success, check your email for verification');
        // return redirect('/email/verify');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return 'fooShow';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Update the usrname or pwd or both only
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_unmpwdOnly(User $primaryKey)
    {
      return $primaryKey;
      // return "foo update unm pwd only";
    }
}
