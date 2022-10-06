<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPasswordResetController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\DplController;
use App\Models\User;
use App\Models\Dpl;
use voku\helper\HtmlMin;
use Illuminate\Support\Facades\DB;
// use App\Http\Livewire\User\Settings\Profile;
use App\View\Components\User\Settings\Profile;
use Illuminate\Support\Facades\Schema;
// use App\Http\Livewire\User\FrontPage;
// use App\Http\Livewire\User\Dashboard;
use App\View\Components\Dashboard\DashboardIndex;
use App\View\Components\Home\HomeIndex;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeIndex::class, 'render']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');


// User Verification
Route::get('/email/verify', [UserVerificationController::class, 'verificationNotice'])->middleware('auth', 'unverified')->name('verification.notice'); // notifikasi saat user registrasi
Route::get('email/verify/{id}/{hash}', [UserVerificationController::class, 'verificationVerify'])->middleware(['auth', 'signed'])->name('verification.verify'); // handling request verification ketika user klik email verification
Route::post('/email/verification-notification', [UserVerificationController::class, 'verificationSend'])->middleware(['auth', 'unverified', 'throttle:6,1'])->name('verification.send'); // re send email verification

// User Reset Password
Route::get('/forgot-password', [UserPasswordResetController::class, 'requestLink'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [UserPasswordResetController::class, 'sendLink'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [UserPasswordResetController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [UserPasswordResetController::class, 'updatePassword'])->middleware('guest')->name('password.update');

// User Dashboard
Route::get('/dashboard/{subCompName}',[DashboardIndex::class, 'preRender'])->middleware('auth');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']); // fetching view, dipakai juga oleh livewire pagination (otomatis)
// Route::get('/dashboard/{component}', [DashboardController::class, 'content'])->middleware(['auth']); // fetching view, dipakai juga oleh livewire pagination (otomatis)
// Route::get('/dashboard/{component}', [Dashboard::class, 'render'])->middleware(['auth']); // fetching view, dipakai juga oleh livewire pagination (otomatis)


// Route::resource('/dpl', DplController::class)->middleware(['auth', 'verified']);

// contoh untuk mendapatkan label X dan Y untuk dpl chart (routing ini tidak dipakai)
Route::get('/dpl-chart', function () {
  $collection = DB::table('dpls')->where('creator_id', '=', Auth::user()->id);
  $labelX = [];
  return $collection->get;
  // return count(DB::table('dpls')->where('creator_id', '=', Auth::user()->id)->get(['noDPL', 'creator_id']));
});


// dibawah ini adalah routing CONTOH
Route::get('/datetime/dpl', function () {

  $result = DB::table('dpls')
  ->where('creator_id', '=', Auth::user()->id)
  ->get(['noDpL','published_at'])->toArray();

  $dpls = [];
  foreach ($result as $obj){
    array_push($dpls, json_decode(json_encode($obj), true));
  }

  $dplsEditted = [];
  foreach ($dpls as $dpl){  
    $trimmed = substr($dpl['published_at'], 0, 7);
    unset($dpl['published_at']);
    $dpl['published_at'] = $trimmed;
    array_push($dplsEditted, $dpl);
  }

  $grouped = collect($dplsEditted)->mapToGroups(function ($item, $key) {
    return [$item['published_at'] => $item['noDPL']];
  });

  $labelY = [];
  foreach ($grouped as $index => $value){
    $labelY += [$index => count(json_decode(json_encode($value))) ];
  }

  return collect($labelY);

  // foreach ($grouped as $value) {
    // array_push($labelY, $value);
    // var_dump($value);

  // }
  // return var_dump($labelY);

  // return $labelY = $grouped->all();
});

// fetching view, dipakai juga oleh livewire pagination (otomatis)
// Route::get('/dashboard/{component}', function ($component) {
//   try {
//     $name = str_replace('-', '.', $component);
//     $response = new HtmlMin();

//     //berhasil
//     // return $response->minify(view('livewire.' . $name));

//     $view = new App\Http\Livewire\User\Dpls\Index;
//     return $response->minify($view->render());
//     // return view('livewire.' . $name );
//   } catch (\Throwable $th) {
//     return null;
//   }
// });



// contoh request data dashboard-content
Route::get('/dashboard-content', function (Request $request) {
  // if ($request->has('users')){
  //   return User::all();
  // }
  return User::find(Auth::user()->id)->dplCreator;
});
// contoh routing untuk mengembalikan data berdasarkan model DB yang diminta
Route::get('/contoh-component', function () {
  return view('contoh', [
    'messagea' => "tes",
    'value' => 2,
  ]);
});

// contoh routing untuk test middleware auth
Route::get('/script/{componentName}', function ($componentName) {
  return $componentName;
  // return url('/js/dashboard.js');
})->middleware('auth');
// User Setting
// Route::get('{user}/setting',[UserController::class, 'settings'])->middleware('auth');
// Route::get('/change-password', [UserPasswordResetController::class, 'changePassword'])->middleware(['auth', 'verified'])->name('password.change');



//contoh component

// routing contoh kirim email
Route::get('send-mail', function () {
  $details = [
    'title' => 'Mail from ItSolutionStuff.com',
    'body' => 'This is for testing email using smtp'
  ];
  Mail::to('ferdisaptoko@gmail.com')->send(new \App\Mail\TestMail($details));
  dd("Email is Sent.");
});
