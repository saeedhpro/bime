<?php

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

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\userController;

Route::get('/',[homeController::class,'page']);
Route::get('/admin',[homeController::class,'admin']);
Route::post('/admin',[homeController::class,'checkLoginAdmin']);
Route::get('/register',[homeController::class,'registerPage']);
Route::get('/logout',[homeController::class,'logout']);
Route::post('/',[homeController::class,'login']);
Route::post('/check/login', [homeController::class,'checkLogin']);
Route::post('/check/register', [homeController::class,'checkRegister']);
Route::post('/check/register/code', [homeController::class,'checkRegisterCode']);
Route::post('/register',[homeController::class,'register']);
Route::post('/register/code',[homeController::class,'registerLogin']);
Route::post('/login/code/pass',[homeController::class,'loginPassCode']);
Route::post('/login/code/pass/form', [homeController::class,'loginPassCodeForm']);
Route::post('/login/pass/form', [homeController::class,'loginPassForm']);
Route::post('/login/code/form', [homeController::class,'loginCodeForm']);
Route::post('/login/pass', [homeController::class,'loginPass']);
Route::post('/login/code', [homeController::class,'loginCode']);
Route::post('/contactu/add', [homeController::class,'contactu']);

Route::get('/login/forgotPassword', [homeController::class, 'forgotPassword']);


Route::prefix('user')->group(function(){
    Route::get('/', [userController::class,'home'])->name('/');

    Route::get('/grop', [userController::class,'grop']);
    Route::post('/grop', [userController::class,'gropAdd']);

    Route::get('/menu/{id}', [userController::class,'menu']);

    Route::get('/menu/{id}/{id_under}', [userController::class,'menuUnder']);

    //فرم
    Route::get('/form/check/{id}', [userController::class,'formCheck']); //بررسی
    Route::post('/form/{hash}', [userController::class,'formSave']); //ثبت

    Route::get('/ticket', [userController::class,'ticketPage']);

    Route::get('/ticket/add', [userController::class,'ticketAddPage']);
    Route::post('/ticket/add', [userController::class,'ticketAdd']);

    Route::get('/ticket/message/{id}', [userController::class,'ticketMessagePage']);
    Route::post('/ticket/message/{id}', [userController::class,'ticketMessage']);



    Route::get('/product', [userController::class,'productPage']);
    Route::get('/product/pay/{id}', [userController::class,'productPay']);
    Route::get('/product/pay/verify/{id}', [userController::class,'productPayVerify']);

    Route::get('/crop', [userController::class,'cropPage']);
    Route::get('/crop/pay/{id}', [userController::class,'cropPay']);
    Route::get('/crop/pay/verify/{id}', [userController::class,'cropPayVerify']);

    Route::get('/advertising/list', [userController::class,'advertisingListPage']);
    Route::get('/advertising', [userController::class,'advertisingPage']);
    Route::post('/advertising', [userController::class,'advertising']);
    Route::get('/advertising/pay/verify/{id}', [userController::class,'advertisingPayVerify']);
    Route::post('/advertising/img/{id}', [userController::class,'advertisingImg']);

    Route::get('/pm', [userController::class,'pmPage']);
    Route::get('/pm/active/{id}', [userController::class,'pmActive']);

    //Route::get('/data', "userController@data");

    Route::get('/invoice', [userController::class,'invoicePage']);
    Route::get('/invoice/pay/{id}', [userController::class ,'invoicePayPage']);
    Route::post('/invoice/pay/add/{id}', [userController::class,'invoicePayAdd']);
    Route::get('/invoice/pay/add/verify/{id}', [userController::class,'invoicePayAddVerify']);
    Route::get('/invoice/all', [userController::class ,'invoiceAllPage']);
    Route::get('/invoice/pay', [userController::class,'invoiceUserPayPage']);


    Route::get('/setting', [userController::class,'settingpage']);
    Route::post('/setting', [userController::class,'setting']);
    Route::post('/setting/password', [userController::class,'settingPassword']);
});


Route::prefix('admin')->group(function () {
     Route::get('/panel', [adminController::class,'home']);


     Route::get('/grop', [adminController::class ,'grops']);
     Route::get('/grop/add', [adminController::class ,'gropAdd']);
     Route::post('/grop/add', [adminController::class ,'addGrop']);

     Route::get('/grop/edit/{id}', [adminController::class,'gropEditPage']);
     Route::post('/grop/edit/{id}', [adminController::class ,'gropEdit']);
     Route::get('/grop/edit/code/{id}', [adminController::class,'gropCodeEdit']);
     Route::get('/grop/activePay/{id}', [adminController::class,'gropActivePay']);
     Route::delete('/grop/delete/{id}', [adminController::class ,'gropDelete']);

     Route::get('/grop/manager/{id}', [adminController::class ,'manager']);
     Route::get('/grop/manager/add/{id}', [adminController::class,'gropManagerAddPage']);
     Route::post('/grop/manager/add/{id}', [adminController::class,'gropManagerAdd']);
     Route::get('/grop/manager/edit/{id}', [adminController::class ,'gropManagerEditPage']);
     Route::post('/grop/manager/edit/{id}', [adminController::class ,'gropManagerEdit']);
     Route::delete('/grop/manager/delete/{id}', [adminController::class,'deleteManager']);

     Route::get('/grop/user/{id}', [adminController::class,'gropUser']);
     Route::get('/grop/user/add/{id}', [adminController::class ,'gropUserAddPage']);
     Route::post('/grop/user/add/{id}', [adminController::class ,'gropUserAdd']);
     Route::get('/grop/user/edit/{id}', [adminController::class ,'gropUserEditPage']);
     Route::post('/grop/user/edit/{id}', [adminController::class ,'gropUserEdit']);
     Route::delete('/grop/user/delete/{id}', [adminController::class ,'deleteGropUser']);

     Route::get('/grop/access/{id}', [adminController::class ,'access']);
     Route::get('/grop/access/accessGropUser/{idGrop}/{idGropUser}', [adminController::class ,'accessGropUser']);
     Route::delete('/grop/access/accessGropUser/delete/{idManagers}/{idUsergrop}', [adminController::class,'accessGropUserDelete']);
      Route::get('/grop/access/page/{idGrop}/{idSetting}', [adminController::class ,'accessSetting']);
     Route::delete('/grop/access/delete/{idManagers}/{idSetting}', [adminController::class ,'accessSettingDelete']);



     Route::get('/menu/add', [adminController::class ,'menuAddPage']);
     Route::post('/menu/add/gropUser', [adminController::class ,'menuGropUser']);
     Route::post('/menu/add', [adminController::class ,'menuAdd']);
     Route::get('/menu', [adminController::class ,'menuPage']);
     Route::get('/menu/edit/{id}', [adminController::class ,'menuEditPage']);
     Route::post('/menu/edit/{id}', [adminController::class ,'menuEdit']);
     Route::delete('/menu/delete/{id}', [adminController::class ,'menuDelete']);

     Route::get('/menu/under/{id}', [adminController::class,'menuUnderPage']);
     Route::get('/menu/under/add/{id}', [adminController::class ,'menuUnderAddPage']);
     Route::post('/menu/under/add/{id}', [adminController::class ,'menuUnderAdd']);
     Route::get('/menu/under/edit/{id}', [adminController::class ,'menuUnderEditPage']);
     Route::post('/menu/under/edit/{id}', [adminController::class ,'menuUnderEdit']);
     Route::delete('/menu/under/delete/{id}', [adminController::class ,'underDelete']);



     Route::get('/user', [adminController::class ,'userPage']);
     Route::get('/user/add', [adminController::class ,'userAdd']);
     Route::post('/user/add', [adminController::class ,'user']);
     Route::get('/user/edit/{id}', [adminController::class ,'userEditPage']);
     Route::post('/user/edit/{id}', [adminController::class ,'userEdit']);
     Route::get('/user/add/xlsx', [adminController::class ,'userAddXlsxPage']);
     Route::post('/user/add/xlsx', [adminController::class ,'userAddXlsx']);
     Route::post('/user/check/registerEdit', [adminController::class ,'checkRegisterEdit']);
     Route::get('/user/pay/{id}', [adminController::class ,'userPayPage']);
     Route::get('/user/forgotPassword/{id}', [adminController::class ,'userForgotPassword']);

     Route::get('/user/data/{id}', [adminController::class ,'userDataPage']);
     Route::get('/user/data/edit/{id}', [adminController::class,'userDataEditPage']);
     Route::post('/user/data/edit/{id}', [adminController::class, 'userDataEdit']);

     Route::get('/user/invoice/{id}', [adminController::class ,'userInvoicePage']);

     Route::get('/user/grop/{id}', [adminController::class,'userGropPage']);
     Route::delete('/user/grop/delete/{id}', [adminController::class ,'userGropDelete']);
     Route::get('/user/grop/add/{id}', [adminController::class,'userGropAddPage']);
     Route::post('/user/grop/add/{id}', [adminController::class,'userGropAdd']);


     /* START فرم */
     Route::get('/form', [adminController::class,'formPage']);
     Route::get('/form/add', [adminController::class ,'formAddPage']); //ایجاد
      Route::post('/form/add', [adminController::class ,'formAdd']); //ذخیره
     Route::get('/form/edit/{id}', [adminController::class ,'formEditPage']); //ویرایش
      Route::post('/form/edit/{id}', [adminController::class, 'formEdit']); //ذخیره
     Route::delete('/form/delete/{id}', [adminController::class, 'formDelete']);

     Route::get('/form/extra-fields/get/{id}', [adminController::class, 'formFieldsGet']); //دریافت فیلدهای اضافی فرم بر اساس آیدی فرم

     Route::get('/form/user/{id}', [adminController::class, 'formUserPage']);
      Route::post('/form/user/edit', [adminController::class, 'formUserEdit']); //ویرایش
     Route::get('/form/user/add/xlsx/{id}', [adminController::class, 'formUserAddPage']);
     Route::post('/form/user/add/xlsx/{id}', [adminController::class, 'formUserAdd']);
      Route::get('/form/user/add/xlsx/download-example/{id}', [adminController::class, 'formUserAddDownloadExcelExample']); //خروجی گرفتن از ستون های فرم برای اکسل نمونه
     Route::delete('/form/user/delete/{id}', [adminController::class , 'formUserDelete']);
      Route::get('/form/user/delete/group/{id}', [adminController::class , 'formUserDeleteGroup']); //حذف گروهی
     /* END فرم */


     Route::get('/ticket', [adminController::class ,'ticketPage']);
     Route::get('/ticket/{id}', [adminController::class ,'ticketGropPage']);
     Route::get('/ticket/message/{id}', [adminController::class , 'ticketMessagePage']);
     Route::post('/ticket/message/{id}', [adminController::class , 'ticketMessage']);
     Route::get('/ticket/active/{id}', [adminController::class , 'ticketActive']);
     Route::delete('/ticket/message/delete/{id}', [adminController::class , 'ticketMessageDelete']);
     Route::delete('/ticket/delete/{id}', [adminController::class ,'ticketDelete']);

     /* Cron Job */
     Route::get('/ticket/all/delete', [adminController::class , 'ticketDeleteDay']);
     /* end Cron Job */

     Route::get('/issue', [adminController::class , 'ticketIssuePage']);
     Route::get('/issue/add', [adminController::class , 'ticketIssueAdd']);
     Route::post('/issue/add', [adminController::class , 'ticketIssue']);
     Route::delete('/issue/delete/{id}', [adminController::class , 'ticketIssueDelete']);

     Route::get('/contactu', [adminController::class , 'contactuPage']);
     Route::delete('/contactu/delete/{id}', [adminController::class ,'contactuDelete']);

     Route::get('/product', [adminController::class , 'productPage']);
     Route::get('/product/add', [adminController::class , 'productAddPage']);
     Route::post('/product/add', [adminController::class , 'productAdd']);
     Route::get('/product/edit/{id}', [adminController::class , 'productEditPage']);
     Route::post('/product/edit/{id}', [adminController::class ,'productEdit']);
     Route::get('/product/status/change/{id}', [adminController::class , 'productChangeStatus']);
     Route::delete('/product/delete/{id}', [adminController::class , 'productDelete']);
     Route::get('/product/purchased', [adminController::class,'productsPurchased']);
     Route::delete('/product/purchased/delete/{id}', [adminController::class, 'productDeletePurchased']);

     Route::get('/crop', [adminController::class ,'cropPage']);
     Route::get('/crop/add', [adminController::class ,'cropAddPage']);
     Route::post('/crop/add', [adminController::class ,'cropAdd']);
     Route::get('/crop/edit/{id}', [adminController::class , 'cropEditPage']);
     Route::post('/crop/edit/{id}', [adminController::class ,'cropEdit']);
     Route::get('/crop/active/{id}', [adminController::class , 'cropActive']);
     Route::get('/crop/pay/{id}', [adminController::class ,'cropPay']);
     Route::delete('/crop/pay/delete/{id}', [adminController::class, 'cropPayDelete']);



     Route::get('/advertising/product', [adminController::class, 'advertisingProductPage']);
     Route::get('/advertising/product/edit/{id}', [adminController::class, 'advertisingProductEdit']);
     Route::post('/advertising/product/edit/{id}', [adminController::class, 'advertisingProduct']);
     Route::post('/advertising/product/img/{id}', [adminController::class, 'advertisingProductImg']);

     Route::get('/advertising', [adminController::class, 'advertisingPage']);
     Route::get('/advertising/img/{id}', [adminController::class, 'advertisingImg']);
     Route::get('/advertising/active/{id}', [adminController::class, 'advertisingActive']);
     Route::delete('/advertising/delete/{id}', [adminController::class,'AdvertisingDelete']);
     /* Cron Job */
     Route::get('/advertising/cronJob/end', [adminController::class, 'advertisingCronJobEnd']);
     /* end Cron Job */

     Route::get('/setting', [adminController::class, 'settingPage']);
     Route::post('/setting', [adminController::class, 'setting']);



     Route::get('/pm', [adminController::class, 'pmPage']);
     Route::get('/pm/show/{id}', [adminController::class, 'pmShowPage']);
     Route::get('/pm/edit/{id}', [adminController::class ,'pmEditPage']);
     Route::get('/pm/add', [adminController::class ,'pmAddPage']);
     Route::post('/pm/add', [adminController::class,'pmAdd']);
     Route::post('/pm/edit/{id}', [adminController::class, 'pmEdit']);
     Route::post('/pm/add/user', [adminController::class ,'pmAddUser']);
     Route::delete('/pm/delete/{id}', [adminController::class, 'pmDelete']);
     Route::delete('/pm/show/delete/{id}', [adminController::class, 'pmShowDelete']);


     Route::get('/invoice', [adminController::class, 'invoicePage']);
     Route::get('/invoice/list/{id}', [adminController::class, 'invoiceGropPage']);
     Route::get('/invoice/add', [adminController::class, 'invoiceAddPage']);
     Route::post('/invoice/add', [adminController::class, 'invoiceAdd']);
     Route::get('/invoice/edit/{id}', [adminController::class, 'invoiceEditPage']);
     Route::post('/invoice/edit/{id}', [adminController::class, 'invoiceEdit']);
     Route::get('/invoice/user/{id}', [adminController::class, 'invoiceUserPage']);
     Route::get('/invoice/user/{id}/{id_user}', [adminController::class, 'invoiceUser']);
     Route::post('/invoice/pay/add/{id}/{id_user}', [adminController::class, 'invoiceUserPay']); //ثبت فیش
     Route::delete('/invoice/pay/delete/{id}', [adminController::class, 'invoicePayDelete']);
     Route::delete('/invoice/delete/{id}', [adminController::class, 'invoiceDelete']);

////////cornjab//////////
     Route::get('/penalty/day', [adminController::class, 'day_penalty']);

 });


 Route::prefix('manager')->group(function(){
     Route::get('/panel', [managerController::class, 'home']);


     Route::get('/grop', [managerController::class, 'grops']);

     Route::get('/grop/edit/{id}', [managerController::class, 'gropEditPage']);
     Route::post('/grop/edit/{id}',[managerController::class, 'gropEdit']);
     Route::get('/grop/edit/code/{id}', [managerController::class, 'gropCodeEdit']);

     Route::delete('/grop/delete/{id}', [managerController::class, 'gropDelete']);

     Route::get('/grop/manager/{id}', [managerController::class, 'manager']);
     Route::get('/grop/manager/add/{id}', [managerController::class, 'gropManagerAddPage']);
     Route::post('/grop/manager/add/{id}', [managerController::class, 'gropManagerAdd']);
     Route::get('/grop/manager/edit/{id}', [managerController::class, 'gropManagerEditPage']);
     Route::post('/grop/manager/edit/{id}', [managerController::class, 'gropManagerEdit']);
     Route::delete('/grop/manager/delete/{id}', [managerController::class, 'deleteManager']);

     Route::get('/grop/user/{id}', [managerController::class, 'gropUser']);
     Route::get('/grop/user/add/{id}', [managerController::class, 'gropUserAddPage']);
     Route::post('/grop/user/add/{id}', [managerController::class, 'gropUserAdd']);
     Route::get('/grop/user/edit/{id}', [managerController::class, 'gropUserEditPage']);
     Route::post('/grop/user/edit/{id}', [managerController::class, 'gropUserEdit']);
     Route::delete('/grop/user/delete/{id}', [managerController::class, 'deleteGropUser']);

     Route::get('/grop/access/{id}', [managerController::class, 'access']);
     Route::get('/grop/access/accessGropUser/{idGrop}/{idGropUser}', [managerController::class, 'accessGropUser']);
     Route::delete('/grop/access/accessGropUser/delete/{idManagers}/{idUsergrop}', [managerController::class, 'accessGropUserDelete']);
      Route::get('/grop/access/page/{idGrop}/{idSetting}', [managerController::class, 'accessSetting']);
     Route::delete('/grop/access/delete/{idManagers}/{idSetting}', [managerController::class, 'accessSettingDelete']);



     Route::get('/menu/add', [managerController::class, 'menuAddPage']);
     Route::post('/menu/add/gropUser', [managerController::class, 'menuGropUser']);
     Route::post('/menu/add', [managerController::class ,'menuAdd']);
     Route::get('/menu', [managerController::class, 'menuPage']);
     Route::get('/menu/edit/{id}', [managerController::class,  'menuEditPage']);
     Route::post('/menu/edit/{id}', [managerController::class, 'menuEdit']);
     Route::delete('/menu/delete/{id}', [managerController::class, 'menuDelete']);

     Route::get('/menu/under/{id}', [managerController::class, 'menuUnderPage']);
     Route::get('/menu/under/add/{id}', [managerController::class, 'menuUnderAddPage']);
     Route::post('/menu/under/add/{id}', [managerController::class, 'menuUnderAdd']);
     Route::get('/menu/under/edit/{id}', [managerController::class, 'menuUnderEditPage']);
     Route::post('/menu/under/edit/{id}', [managerController::class, 'menuUnderEdit']);
     Route::delete('/menu/under/delete/{id}', [managerController::class, 'underDelete']);



     Route::get('/user', [managerController::class ,'userPage']);
     Route::get('/user/add', [managerController::class, 'userAdd']);
     Route::post('/user/add', [managerController::class ,'user']);
     Route::get('/user/edit/{id}', [managerController::class, 'userEditPage']);
     Route::post('/user/edit/{id}', [managerController::class, 'userEdit']);
     Route::get('/user/add/xlsx', [managerController::class ,'userAddXlsxPage']);
     Route::post('/user/add/xlsx', [managerController::class, 'userAddXlsx']);
     Route::post('/user/check/registerEdit', [managerController::class, 'checkRegisterEdit']);
//     Route::get('/user/pay/{id}', "managerController@userPayPage");
     Route::get('/user/forgotPassword/{id}', [managerController::class ,'userForgotPassword']);

     Route::get('/user/dataAll', [managerController::class, 'userDataAllPage']);
     Route::get('/user/data/{id}', [managerController::class, 'userDataPage']);
     Route::get('/user/data/edit/{id}', [managerController::class, 'userDataEditPage']);
     Route::post('/user/data/edit/{id}', [managerController::class, 'userDataEdit']);

     Route::get('/user/grop/{id}', [managerController::class ,'userGropPage']);
     Route::delete('/user/grop/delete/{id}', [managerController::class ,'userGropDelete']);
     Route::get('/user/grop/add/{id}', [managerController::class , 'userGropAddPage']);
     Route::post('/user/grop/add/{id}', [managerController::class, 'userGropAdd']);


     /* START فرم */
     Route::get('/form', [managerController::class, 'formPage']);
     Route::get('/form/add', [managerController::class, 'formAddPage']); //ایجاد
      Route::post('/form/add', [managerController::class ,'formAdd']); //ذخیره
     Route::get('/form/edit/{id}', [managerController::class ,'formEditPage']); //ویرایش
      Route::post('/form/edit/{id}', [managerController::class ,'formEdit']); //ذخیره
     Route::delete('/form/delete/{id}', [managerController::class, 'formDelete']);

     Route::get('/form/extra-fields/get/{id}', [managerController::class, 'formFieldsGet']); //دریافت فیلدهای اضافی فرم بر اساس آیدی فرم

     Route::get('/form/user/{id}', [managerController::class, 'formUserPage']);
      Route::post('/form/user/edit', [managerController::class, 'formUserEdit']); //ویرایش
     Route::get('/form/user/add/xlsx/{id}', [managerController::class, 'formUserAddPage']);
     Route::post('/form/user/add/xlsx/{id}', [managerController::class, 'formUserAdd']);
      Route::get('/form/user/add/xlsx/download-example/{id}', [managerController::class, 'formUserAddDownloadExcelExample']); //خروجی گرفتن از ستون های فرم برای اکسل نمونه
     Route::delete('/form/user/delete/{id}', [managerController::class ,'formUserDelete']);
      Route::get('/form/user/delete/group/{id}', [managerController::class, 'formUserDeleteGroup']); //حذف گروهی
     /* END فرم */


     Route::get('/ticket', [managerController::class, 'ticketPage']);
     Route::get('/ticket/message/{id}', [managerController::class ,'ticketMessagePage']);
     Route::post('/ticket/message/{id}', [managerController::class ,'ticketMessage']);
     Route::get('/ticket/active/{id}', [managerController::class, 'ticketActive']);
     Route::delete('/ticket/message/delete/{id}', [managerController::class, 'ticketMessageDelete']);
     Route::delete('/ticket/delete/{id}', [managerController::class ,'ticketDelete']);



     Route::get('/issue', [managerController::class ,'ticketIssuePage']);
     Route::get('/issue/add', [managerController::class, 'ticketIssueAdd']);
     Route::post('/issue/add', [managerController::class ,'ticketIssue']);
     Route::delete('/issue/delete/{id}', [managerController::class ,'ticketIssueDelete']);

     Route::get('/contactu', [managerController::class, 'contactuPage']);
     Route::delete('/contactu/delete/{id}', [managerController::class ,'contactuDelete']);


//     Route::get('/product', "managerController@productPage");
//     Route::get('/product/add', "managerController@productAddPage");
//     Route::post('/product/add', "managerController@productAdd");
//     Route::get('/product/edit/{id}', "managerController@productEditPage");
//     Route::post('/product/edit/{id}', "managerController@productEdit");
//     Route::get('/product/active/{id}', "managerController@productActive");



     Route::get('/advertising/product', [managerController::class, 'advertisingProductPage']);
     Route::get('/advertising/product/edit/{id}', [managerController::class, 'advertisingProductEdit']);
     Route::post('/advertising/product/edit/{id}', [managerController::class ,'advertisingProduct']);
     Route::post('/advertising/product/img/{id}', [managerController::class ,'advertisingProductImg']);

     Route::get('/advertising', [managerController::class, 'advertisingPage']);
     Route::get('/advertising/img/{id}', [managerController::class, 'advertisingImg']);
     Route::get('/advertising/active/{id}', [managerController::class, 'advertisingActive']);


//     Route::get('/setting', "managerController@settingPage");
//     Route::post('/setting', "managerController@setting");





     Route::get('/pm', [managerController::class ,'pmPage']);
     Route::get('/pm/show/{id}', [managerController::class, 'pmShowPage']);
     Route::get('/pm/edit/{id}', [managerController::class ,'pmEditPage']);
     Route::get('/pm/add', [managerController::class, 'pmAddPage']);
     Route::post('/pm/add', [managerController::class, 'pmAdd']);
     Route::post('/pm/edit/{id}', [managerController::class ,'pmEdit']);
     Route::post('/pm/add/user', [managerController::class ,'pmAddUser']);
     Route::delete('/pm/delete/{id}', [managerController::class ,'pmDelete']);
     Route::delete('/pm/show/delete/{id}', [managerController::class ,'pmShowDelete']);

     Route::get('/invoice', [managerController::class ,'invoicePage']);
     Route::get('/invoice/user/all', [managerController::class ,'invoiceUserAllUserGrops']);
      Route::get('/invoice/user/all/{id}', [managerController::class, 'invoiceUserAllList']);
     Route::get('/invoice/unconfirmed-receipts', [managerController::class ,'invoiceUnconfirmedReceipts']);
     //صورتحساب تکی کاربر
     Route::get('/invoice/user/single', [managerController::class ,'invoiceUserSingle']);
      Route::get('/invoice/user/single/{category}/{id}', [managerController::class ,'invoiceUserSingleInfo']); //نمایش بر اساس دسته انتخاب شده
     Route::get('/invoice/add', [managerController::class, 'invoiceAddPage']);
     Route::post('/invoice/add', [managerController::class, 'invoiceAdd']);
     Route::get('/invoice/edit/{id}', [managerController::class ,'invoiceEditPage']);
     Route::post('/invoice/edit/{id}', [managerController::class ,'invoiceEdit']);
     Route::get('/invoice/user/{id}', [managerController::class, 'invoiceUserPage']);
     Route::get('/invoice/user/{id}/{id_user}', [managerController::class ,'invoiceUser']);
     Route::post('/invoice/pay/add/{id}/{id_user}', [managerController::class ,'invoiceUserPay']); //ثبت فیش
     Route::get('/invoice/pay/active/{string}', [managerController::class, 'invoicePayActive']); //تغییر وضعیت فعال/غیرفعال به بالعکس
     Route::delete('/invoice/pay/delete/{id}', [managerController::class ,'invoicePayDelete']);
     Route::delete('/invoice/delete/{id}', [managerController::class ,'invoiceDelete']);

     Route::get('/user/invoice/{id}', [managerController::class, 'userInvoicePage']);

     Route::get('/crop', [managerController::class, 'cropPage']);
     Route::get('/crop/add', [managerController::class ,'cropAddPage']);
     Route::post('/crop/add', [managerController::class ,'cropAdd']);
     Route::get('/crop/edit/{id}', [managerController::class ,'cropEditPage']);
     Route::post('/crop/edit/{id}', [managerController::class ,'cropEdit']);
     Route::get('/crop/active/{id}', [managerController::class ,'cropActive']);
     Route::get('/crop/pay/{id}', [managerController::class ,'cropPay']);
     Route::delete('/crop/pay/delete/{id}', [managerController::class, 'cropPayDelete']);

 });

//Route::get('/test', [testcon ,'test']);
//Route::get('/test/pay/{id}', [testController::class ,'pay']);


// Route::prefix('user')->group(function () {
//     Route::get('scoreboard',"userController@scoreboard");
//     Route::get('scoreboard/{id}',"userController@scoreboardUser");


//     Route::get('addIdea',"userController@pageAddIdea");
//     Route::post('addIdea/key',"userController@addIdeaKey");
//     Route::post('addIdea',"userController@addIdea");

//     Route::get('proces',"userController@proces");
//     Route::get('idea/view/{id}',"userController@viewIdea");
//     Route::patch('idea/rate/{id}',"userController@addRate");
//     Route::patch('proces/idea/activity/{id}',"userController@ideaActivity");

//     Route::get('idea/edit/{id}',"userController@pageEditIdea");
//     Route::post('idea/edit/{id}',"userController@editIdea");

//     Route::get('waiting',"userController@pageWaiting");
//     Route::get('waiting/idea/view/{id}',"userController@viewIdeaWaiting");
//     Route::patch('waiting/idea/activity/{id}',"userController@waitingIdeaActivity");
//     Route::patch('waiting/idea/end/{id}',"userController@waitingIdeaEnd");


//     Route::get('/ideas',"userController@pageIdeas");


// });
