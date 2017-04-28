<?php
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    /*帳務表*/
    Route::get('accounts', 'AccountsController@getImport');
    Route::post('accounts', 'AccountsController@postImport');
    Route::resource('account', 'AccountsController');
    Route::get('excel/account/export', 'AccountsController@export');
    Route::get('account/sub2class/in/{no}', 'AccountsController@getSub2classIn');/*ajax抓收入會計科目2*/
    Route::get('account/sub2class/out/{no}', 'AccountsController@getSub2classOut');/*ajax抓支出會計科目2*/
    Route::delete('account/delete/{no}', 'AccountsController@delete');/*首頁進行刪除*/

    /*會計科目*/
    Route::get('account_classes', 'AccountClassesController@getImport');
    Route::post('account_classes', 'AccountClassesController@postImport');
    Route::resource('account_class', 'AccountClassesController');
    Route::get('excel/subclass/export', 'AccountClassesController@p_export');
    Route::get('excel/account_class/export', 'AccountClassesController@export');
    Route::delete('account_class/delete/{no}', 'AccountClassesController@delete');/*首頁進行刪除*/

    /*課程表*/
    Route::get('courses', 'CoursesController@getImport');
    Route::post('courses', 'CoursesController@postImport');
    Route::resource('course', 'CoursesController');
    Route::get('excel/course/export', 'CoursesController@export');/*下載*/
    Route::delete('course/delete/{no}', 'CoursesController@delete');/*首頁進行刪除*/

    /*修課紀錄表*/
    Route::get('course_registrations', 'CourseRegistrationsController@getImport');
    Route::post('course_registrations', 'CourseRegistrationsController@postImport'); /*上傳*/
    Route::resource('course_registration', 'CourseRegistrationsController');
    Route::get('excel/course_registration/export', 'CourseRegistrationsController@export');/*下載*/
    Route::get('course_registrations/{no}', 'CourseRegistrationsController@getCourse_registration');/*ajax*/
    Route::delete('course_registration/delete/{no}', 'CourseRegistrationsController@delete');/*首頁進行刪除*/

    /*產品項目*/

    Route::get('product_orders', 'ProductsController@getImport');
    Route::post('product_orders', 'ProductsController@postImport');
    Route::resource('product_order', 'ProductsController');
    Route::get('product_orders/{no}', 'ProductsController@getProduct');/*ajax庫存量+原價*/
    Route::get('excel/product_order/export', 'ProductsController@export');
    Route::get('excel/product/export', 'ProductsController@p_export');
    Route::delete('product_order/delete/{no}', 'ProductsController@delete');/*首頁進行刪除*/

    /*教會名錄*/
    Route::get('churches', 'ChurchesController@getImport');
    Route::post('churches', 'ChurchesController@postImport');
    Route::resource('church', 'ChurchesController');
    Route::get('excel/church/export', 'ChurchesController@export');
    Route::delete('church/delete/{no}', 'ChurchesController@delete');/*首頁進行刪除*/
//    Route::get('church/show/{no}', 'ChurchesController@show');/*彈跳顯示*/

    /*會員資料*/
    Route::get('members', 'MembersController@getImport');
    Route::post('members', 'MembersController@postImport');
    Route::resource('member', 'MembersController');
    Route::get('excel/member/export', 'MembersController@export');
    Route::delete('member/delete/{no}', 'MembersController@delete');/*首頁進行刪除*/
    /*奉獻收據*/
    Route::resource('pdf', 'ReceiptToPdfController');
    Route::get('pdf_person/{no}', 'ReceiptToPdfController@getPdfPerson');/*ajax*/
    Route::get('pdf_detail/{no}', 'ReceiptToPdfController@getPdfDetail');/*ajax*/

});

/*測試*/
Route::get('Test_array', 'ArrayController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/app', function () {
    return view('app');
});
Route::get('/template', function () {
    return view('template');
});
/*Route::get('/login', function () {
    return view('tcrm.login');
});*/
Route::get('/test', function () {
    return view('test.testaddress');
});
Route::get('/table', function () {
    return view('test.table');
});
Route::get('/vue', function () {
    return view('test.vue');
});
Route::get('/bootstrap-va', function () {
    return view('test.bootstrap-va');
});
//Route::get('/select', function () {
//    return view('test.select');
//});
//Route::get('pdf', 'ReceiptToPdfController@index');
//Route::get('getPDF', 'ReceiptToPdfController@getPDF');
//Route::post('postPDF', 'ReceiptToPdfController@postPDF');

