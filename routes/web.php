<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Roles;

use App\Http\Controllers\DashbordScreenController;
use App\Livewire\UsersScreen;
use App\Livewire\UsersGroups;
use App\Livewire\RolesScreen;
use App\Livewire\Tasking;

// use Auth;
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
    adduser();
   
    return view('auth.login');
});

Auth::routes();
Route::middleware('auth')->group(function() {
    Route::get('UsersScreen',UsersScreen::class)->name('UsersScreen');
    Route::Post('Store_user',[UsersScreen::class,'Store_user'])->name('Store_user');
    Route::Post('Stop_user',[UsersScreen::class,'Stop_user'])->name('Stop_user');
    Route::get('UsersGroups',UsersGroups::class)->name('UsersGroups');
    Route::Post('Store_gruops',[UsersGroups::class,'Store_gruops'])->name('Store_gruops');
    Route::get('RolesScreen',RolesScreen::class)->name('RolesScreen');
    Route::Post('set_rols',[RolesScreen::class,'set_rols'])->name('set_rols');
    Route::get('Tasking',Tasking::class)->name('Tasking');
    Route::Post('Store_task',[Tasking::class,'Store_task'])->name('Store_task');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::post('/d', [App\Http\Controllers\HomeController::class, 'd'])->name('d');
    Route::get('DashbordScreen',[DashbordScreenController::class,'show'])->name('DashbordScreen');
    
});


 function adduser()
{
    $d=User::get();
    if(count($d)==0)
    {
        $d=new User();
        $d->name="admin";
        $d->email="admin@gmail.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("admin");
        $d->save();

        $id_user=User::max('id');
      
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=1;
        $roles->Users=1;
        $roles->Group=1;
        $roles->Roles=1;
        $roles->Financial_exchange=1;
        $roles->Store_exchange=1;
        $roles->vacation_request=1;
        $roles->buy_request=1;
        $roles->ok_Financial_exchange=1;
        $roles->ok_Store_exchange=1;
        $roles->ok_vacation_request=1;
        $roles->ok_buy_request=1;
        $roles->show_Financial_exchange=1;
        $roles->show_Store_exchange=1;
        $roles->show_vacation_request=1;
        $roles->show_buy_request=1;
        $roles->send_message=1;
        $roles->send_file=1;
        $roles->new_task=1;
        $roles->save();
        




        $d=new User();
        $d->name="hussam";
        $d->email="hu@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
        $d->save();


        $id_user=User::max('id');
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=0;
        $roles->Group=0;
        $roles->Roles=0;
        $roles->Financial_exchange=1;
        $roles->Store_exchange=1;
        $roles->vacation_request=1;
        $roles->buy_request=1;
        $roles->ok_Financial_exchange=0;
        $roles->ok_Store_exchange=0;
        $roles->ok_vacation_request=0;
        $roles->ok_buy_request=0;
        $roles->show_Financial_exchange=0;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();


        $d=new User();
        $d->name="ali";
        $d->email="a@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
        $d->save();

        $id_user=User::max('id');
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=0;
        $roles->Group=0;
        $roles->Roles=0;
        $roles->Financial_exchange=1;
        $roles->Store_exchange=1;
        $roles->vacation_request=1;
        $roles->buy_request=1;
        $roles->ok_Financial_exchange=0;
        $roles->ok_Store_exchange=0;
        $roles->ok_vacation_request=0;
        $roles->ok_buy_request=0;
        $roles->show_Financial_exchange=0;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();

        $d=new User();
        $d->name="mohammed";
        $d->email="mo@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
        $d->save();

        $id_user=User::max('id');
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=0;
        $roles->Group=0;
        $roles->Roles=0;
        $roles->Financial_exchange=1;
        $roles->Store_exchange=1;
        $roles->vacation_request=1;
        $roles->buy_request=1;
        $roles->ok_Financial_exchange=0;
        $roles->ok_Store_exchange=0;
        $roles->ok_vacation_request=0;
        $roles->ok_buy_request=0;
        $roles->show_Financial_exchange=0;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();

        $d=new User();
        $d->name="suad";
        $d->email="su@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
        $d->save();

        $id_user=User::max('id');
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=0;
        $roles->Group=0;
        $roles->Roles=0;
        $roles->Financial_exchange=1;
        $roles->Store_exchange=1;
        $roles->vacation_request=1;
        $roles->buy_request=1;
        $roles->ok_Financial_exchange=0;
        $roles->ok_Store_exchange=0;
        $roles->ok_vacation_request=0;
        $roles->ok_buy_request=0;
        $roles->show_Financial_exchange=0;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();

    }
}
