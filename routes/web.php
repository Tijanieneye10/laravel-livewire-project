<?php



use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Registration;
use Illuminate\Support\Facades\Route;
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// // Route::get('/', function () {
// //     // $comments = Comment::all();
// //     return view('welcome');
// // });

Route::middleware(['auth'])->get('/',  Home::class)->name('home');
Route::get('/login',  Login::class)->name('login');
Route::get('/logout',  Logout::class)->name('logout');
Route::get('/register',  Registration::class);
