<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Roles;
use App\Http\Controllers\Showings;
use App\Http\Controllers\DashbordScreenController;
use App\Livewire\UsersScreen;
use App\Livewire\UsersGroups;
use App\Livewire\RolesScreen;
use App\Livewire\Tasking;
use App\Livewire\CashMoney;
use App\Livewire\OkCashMoney;
use App\Livewire\ShowMoneyCash;
use App\Livewire\CashStore;
use App\Livewire\OKCashStore;
use App\Livewire\ShowCashStore;
use App\Livewire\AskOff;
use App\Livewire\OkAskOff;
use App\Livewire\ShowAskOff;
use App\Livewire\AskBuy;
use App\Livewire\OKAskBuy;
use App\Livewire\ShowAskBuy;
use App\Livewire\Messaging;
use App\Livewire\Archef;
use App\Livewire\Pepers;
use App\Http\Controllers\ShowReports;
// use App\Livewire\CashMoneyInformaion;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $r) {
    adduser();
    // return $r->id;
    session()->put("token",$r->id);
    if(Auth::check()){
        return redirect()->route('oprations');
    }
    return view('auth.login');
});

Auth::routes();
Route::middleware('auth')->group(function() {
    Route::get('NewCashMoney',[Showings::class,'CashMoney'])->name('NewCashMoney');
    Route::get('NewStoreMoney',[Showings::class,'CashStore'])->name('NewStoreMoney');


























    Route::get('UsersScreen',UsersScreen::class)->name('UsersScreen');
    Route::Post('Store_user',[UsersScreen::class,'Store_user'])->name('Store_user');
    Route::Post('Stop_user',[UsersScreen::class,'Stop_user'])->name('Stop_user');
    Route::get('UsersGroups',UsersGroups::class)->name('UsersGroups');
    Route::Post('Store_gruops',[UsersGroups::class,'Store_gruops'])->name('Store_gruops');
    Route::get('RolesScreen',RolesScreen::class)->name('RolesScreen');
    Route::Post('set_rols',[RolesScreen::class,'set_rols'])->name('set_rols');
    Route::get('Tasking',Tasking::class)->name('Tasking');
    Route::Post('Store_task',[Tasking::class,'Store_task'])->name('Store_task');
    Route::Post('DaneTask',[Tasking::class,'DaneTask'])->name('DaneTask');
    Route::Post('NoTask',[Tasking::class,'NoTask'])->name('NoTask');
    Route::get('CashMoney',CashMoney::class)->name('CashMoney');
    Route::Post('StoreCashMoneyTable',[CashMoney::class,'StoreCashMoneyTable'])->name('StoreCashMoneyTable');
    Route::Post('DeleteCashMoneyTable',[CashMoney::class,'DeleteCashMoneyTable'])->name('DeleteCashMoneyTable');
    // Route::get('OkCashMoney',OkCashMoney::class)->name('OkCashMoney');
    Route::get('OkCashMoney',[Showings::class,'OKCashmoney'])->name('OkCashMoney');
    Route::Post('StoreOkCashMoney',[OkCashMoney::class,'StoreOkCashMoney'])->name('StoreOkCashMoney');
    Route::Post('NoOkCashMoney',[OkCashMoney::class,'NoOkCashMoney'])->name('NoOkCashMoney');
    // Route::get('ShowMoneyCash',ShowMoneyCash::class)->name('ShowMoneyCash');
    Route::Post('CashMoney',[ShowMoneyCash::class,'CashMoney'])->name('CashMoney');
    Route::Post('BackCashMoney',[ShowMoneyCash::class,'BackCashMoney'])->name('BackCashMoney');

    Route::get('CashStore',CashStore::class)->name('CashStore');
    Route::Post('StoreCashStoreTable',[CashStore::class,'StoreCashStoreTable'])->name('StoreCashStoreTable');
    Route::Post('DeleteCashStoreTable',[CashStore::class,'DeleteCashStoreTable'])->name('DeleteCashStoreTable');
    Route::get('OKCashStore',OKCashStore::class)->name('OKCashStore');
    Route::Post('StoreOkCashstore',[OKCashStore::class,'StoreOkCashstore'])->name('StoreOkCashstore');
    Route::Post('NoOkCashstore',[OKCashStore::class,'NoOkCashstore'])->name('NoOkCashstore');
    Route::get('ShowCashStore',ShowCashStore::class)->name('ShowCashStore');
    Route::Post('CashStoreDane',[ShowCashStore::class,'CashStore'])->name('CashStoreDane');
    Route::Post('BackCashStore',[ShowCashStore::class,'BackCashStore'])->name('BackCashStore');

    // Route::get('AskOff',AskOff::class)->name('AskOff');
    Route::Post('StoreAskoffTable',[AskOff::class,'StoreAskoffTable'])->name('StoreAskoffTable');
    Route::Post('DeleteAskoffTable',[AskOff::class,'DeleteAskoffTable'])->name('DeleteAskoffTable');

    // Route::get('OkAskOff',OkAskOff::class)->name('OkAskOff');
    Route::Post('StoreOkAskoff',[OkAskOff::class,'StoreOkAskoff'])->name('StoreOkAskoff');
    Route::Post('NoOkAskoff',[OkAskOff::class,'NoOkAskoff'])->name('NoOkAskoff');

    // Route::get('ShowAskOff',ShowAskOff::class)->name('ShowAskOff');
    Route::Post('DoneAskOff',[ShowAskOff::class,'DoneAskOff'])->name('DoneAskOff');
    Route::Post('BackCashMoney',[ShowAskOff::class,'BackCashMoney'])->name('BackCashMoney');


    Route::get('AskBuy',AskBuy::class)->name('AskBuy');
    Route::Post('StoreAskBuyTable',[AskBuy::class,'StoreAskBuyTable'])->name('StoreAskBuyTable');
    Route::Post('DeleteAskBuyTable',[AskBuy::class,'DeleteAskBuyTable'])->name('DeleteAskBuyTable');


    Route::get('OKAskBuy',OKAskBuy::class)->name('OKAskBuy');
    Route::Post('StoreOKAskBuy',[OKAskBuy::class,'StoreOKAskBuy'])->name('StoreOKAskBuy');
    Route::Post('NoOKAskBuy',[OKAskBuy::class,'NoOKAskBuy'])->name('NoOKAskBuy');


    Route::get('ShowAskBuy',ShowAskBuy::class)->name('ShowAskBuy');
    Route::Post('AskBuyTableDone',[ShowAskBuy::class,'AskBuyTable'])->name('AskBuyTableDone');
    Route::Post('BackAskBuyTable',[ShowAskBuy::class,'BackAskBuyTable'])->name('BackAskBuyTable');

    Route::get('Messaging',Messaging::class)->name('Messaging');
    Route::Post('SendMessage',[Messaging::class,'SendMessage'])->name('SendMessage');
    Route::Post('SendFiles',[Messaging::class,'SendFiles'])->name('SendFiles');
    Route::Post('Store_connect',[UsersGroups::class,'Store_connect'])->name('Store_connect');
    Route::Post('Delete_connect',[UsersGroups::class,'Delete_connect'])->name('Delete_connect');
    Route::get('/oprations', [App\Http\Controllers\HomeController::class, 'ind'])->name('oprations');

    Route::get('Archef',Archef::class)->name('Archef');
    Route::Post('ArchefSaveFile',[Archef::class,'SaveFiles'])->name('ArchefSaveFile');
    Route::Post('Delete_group',[UsersGroups::class,'Delete_group'])->name('Delete_group');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::post('/d', [App\Http\Controllers\HomeController::class, 'd'])->name('d');
    Route::get('DashbordScreen',[DashbordScreenController::class,'show'])->name('DashbordScreen');
    Route::get('/ChangePassword', [App\Http\Controllers\HomeController::class, 'ChangePassword'])->name('ChangePassword');
    Route::get('/chatok', [App\Http\Controllers\HomeController::class, 'chatok'])->name('chatok');
    Route::get('/CashMoneyInformaion/{id}',[Showings::class,'CashMoneyInformation'])->name('CashMoneyInformaion');
    Route::get('/CashStoreInformaion/{id}',[Showings::class,'CashStoreInformation'])->name('CashStoreInformaion');
    Route::get('/ShowMoneyCash',[Showings::class,'ShowMoneyCash'])->name('ShowMoneyCash');
    Route::get('/okcashstore',[Showings::class,'okcashstore'])->name('okcashstore');
    Route::get('/showcahstore',[Showings::class,'showcahstore'])->name('showcahstore');
    Route::get('/OffType',[Showings::class,'OffType'])->name('OffType');
    Route::get('/askoff',[Showings::class,'askOff'])->name('askoff');
    Route::get('/Pepers',[Showings::class,'Pepers'])->name('Pepers');
    Route::post('/pepersstore',[Pepers::class,'Send'])->name('pepersstore');
    Route::get('/ShowOff/{id}',[Showings::class,'ShowOff'])->name('ShowOff');
    Route::get('/Okaskoff',[Showings::class,'Okaskoff'])->name('Okaskoff');
    Route::get('/ShowAskOff',[Showings::class,'ShowAskOff'])->name('ShowAskOff');
    Route::get('/YearBlance',[Showings::class,'YearBlance'])->name('YearBlance');
    Route::get('/mainpeper/{id}',[ShowReports::class,'mainpeper'])->name('mainpeper');
});


 function adduser()
{
    $d=User::get();
    if(count($d)==0)
    {
        $d=new User();
        $d->name="رئيس النظام";
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
        $d->name="حسام  دومان";
        $d->email="hu@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
        $d->save();


        $id_user=User::max('id');
        $roles=new Roles();
        $roles->id_user=$id_user;
        $roles->Dashbord=0;
        $roles->Users=1;
        $roles->Group=1;
        $roles->Roles=1;
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
        $roles->send_message=1;
        $roles->send_file=1;
        $roles->new_task=0;
        $roles->save();


        $d=new User();
        $d->name="اثير الحسابات";
        $d->email="th@g.com";
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
        $roles->show_Financial_exchange=1;
        $roles->show_Store_exchange=0;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=1;
        $roles->send_file=0;
        $roles->new_task=1;
        $roles->save();

        $d=new User();
        $d->name="ريم المخازن";
        $d->email="rem@g.com";
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
        $roles->show_Store_exchange=1;
        $roles->show_vacation_request=0;
        $roles->show_buy_request=0;
        $roles->send_message=0;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();

        $d=new User();
        $d->name="د سعاد عثمان";
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
        $roles->send_message=1;
        $roles->send_file=0;
        $roles->new_task=1;
        $roles->save();



        $d=new User();
        $d->name="د سعد العتابي";
        $d->email="sa@g.com";
        $d->phone="77";
        $d->image="no.png";

        $d->password=Hash::make("77");
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
        $d->name="د انتصار الهلالي";
        $d->email="an@g.com";
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
        $roles->send_message=1;
        $roles->send_file=0;
        $roles->new_task=1;
        $roles->save();


        $d=new User();
        $d->name="زكريا";
        $d->email="zk@g.com";
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
        $roles->send_message=1;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();


        $d=new User();
        $d->name="هيام";
        $d->email="hm@g.com";
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
        $roles->send_message=1;
        $roles->send_file=0;
        $roles->new_task=0;
        $roles->save();



    }
}
