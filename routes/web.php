<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $d=User::get();
    if(count($d)==0)
    {
        $d=new User();
        $d->name="admin";
        $d->email="admin@gmail.com";
        $d->password=Hash::make("admin");
        $d->save();

        $d=new User();
        $d->name="hussam";
        $d->email="hu@g.com";
        $d->password=Hash::make("77");
        $d->save();


        $d=new User();
        $d->name="ali";
        $d->email="a@g.com";
        $d->password=Hash::make("77");
        $d->save();

        $d=new User();
        $d->name="mohammed";
        $d->email="mo@g.com";
        $d->password=Hash::make("77");
        $d->save();

        $d=new User();
        $d->name="suad";
        $d->email="su@g.com";
        $d->password=Hash::make("77");
        $d->save();

    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/d', [App\Http\Controllers\HomeController::class, 'd'])->name('d');
