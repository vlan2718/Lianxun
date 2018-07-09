<?php
/**
 * Created by PhpStorm.
 * User: victro
 * Date: 2018/6/12
 * Time: 9:03
 */
Route::get('/index_main','IndexController@index_main');
Route::get('/login_log','IndexController@login_log');
Route::get('/role_error','IndexController@role_error');
Route::get('/main','IndexController@main');
Route::get('/modManagePwd','IndexController@ModManagePwd');
Route::any('/updatePasswordAdmin','IndexController@updatePasswordAdmin');
//Route::get('/vue_route','IndexController@vue_route');


/*
 * 会员管理
 */
Route::group(['namespace'=>'Member','prefix'=>'member'],function (){
  Route::get('/Lavel','IndexController@MemberLavel');
  Route::get('/JifenConfig','IndexController@MemberJifenConfig');
  Route::get('/Admin','IndexController@MembersAdmin');
  Route::get('/Info/{users}','IndexController@MemberInfo');

  /*
   * 	会员等级设置权限
   */
  Route::any('/getLavelList','IndexController@getLavelList')->name('MemberLavel')->middleware('role');
  Route::post('/createLevel','IndexController@createLevel')->name('createLevel')->middleware('role');
  Route::post('/updateLevel','IndexController@createLevel')->name('updateLevel')->middleware('role');
  Route::post('/deleteLevel','IndexController@deleteLevel')->name('deleteLevel')->middleware('role');

    /*
     * 	积分规则设置
     */
    Route::get('/getJifenConfig','IndexController@getMemberJifenConfig')->name('getJifenConfig')->middleware('role');
    Route::post('/saveMemberJifenConfig','IndexController@saveMemberJifenConfig')->name('saveMemberJifenConfig')->middleware('role');


    /*
     * 会员管理
     */
    Route::get('/getMembersAdmin','IndexController@getMembersAdmin')->name('getMembersAdmin')->middleware('role');
    Route::post('/getUserByReg_invite_code','IndexController@getUserByReg_invite_code');
    Route::any('/getUserById','IndexController@getUserById')->name('getUserById')->middleware('role');
    Route::any('/updateUserInfo','IndexController@updateUserInfo');

    Route::any('/updateUserInfoAvatar','IndexController@updateUserInfoAvatar');

    Route::any('/updateUserPassword','IndexController@updateUserPassword')->name('updateUserPassword')->middleware('role');

    Route::any('/tomessageUserId','IndexController@tomessageUserId');
    Route::any('/tomessageUserIds','IndexController@tomessageUserIds');



});

/*
 * 信息管理
 */
Route::group(['namespace'=>'Message','prefix'=>'message'],function (){
    Route::get('/NewsClass','IndexController@NewsClass');
    Route::get('/NewsClassList','IndexController@NewsClassList')->name('NewsClassList')->middleware('role');
    Route::any('/deleteNewsClass','IndexController@deleteNewsClass')->name('deleteNewsClass')->middleware('role');
    Route::any('/createNewsClass','IndexController@createNewsClass')->name('createNewsClass')->middleware('role');
    Route::any('/updateNewsClass','IndexController@createNewsClass')->name('updateNewsClass')->middleware('role');


    Route::any('/createNewsClassSon','IndexController@createNewsClassSon');
    Route::get('/NewsClassSon/{category}','IndexController@NewsClassSon');
    Route::get('/NewsClassSonList/{category}','IndexController@NewsClassSonList');


    Route::get('/stateTagAdmin','IndexController@stateTagAdmin');
    Route::get('/stateTagAdminList','IndexController@stateTagAdminList');
    Route::any('/createStateTagAdminList','IndexController@createStateTagAdminList');
    Route::any('/deleteStateTagList','IndexController@deleteStateTagList');
    Route::get('/tagAdmin','IndexController@tagAdmin');
    Route::get('/tagAdminList','IndexController@tagAdminList');
    Route::any('/deleteTagAdminList','IndexController@deleteTagAdminList');
    Route::any('/createTagAdminList','IndexController@createTagAdminList');

    Route::get('/getStateTagAdminListByUser_news/{userNews}','IndexController@getStateTagAdminListByUser_news');
    Route::get('/getAdminTabNewsByNews/{news}','IndexController@getAdminTabNewsByNews');

    Route::any('/add_User_new_tab','IndexController@add_User_new_tab');
    Route::any('/add_Admin_new_tab','IndexController@add_Admin_new_tab');

    Route::any('/get_Admin_new_tab/{news}','IndexController@get_Admin_new_tab');
    Route::any('/tagAdminListOk/{news}','IndexController@tagAdminListOk');
    Route::any('/tagListOk/{userNews}','IndexController@tagListOk');
    Route::any('/CreatetagAdminListOk','IndexController@CreatetagAdminListOk');
    Route::get('/getNewsClassList',"IndexController@getNewsClassList");
    /*
     * newsadmin信息发布管理
     */
    Route::get('/newsadmin','IndexController@newsadmin');
    Route::get('/getNewAdminList','IndexController@getNewAdminList')->name('getNewAdminList')->middleware('role');
    Route::any('/deleteNewAdminList','IndexController@deleteNewAdminList')->name('deleteNewAdminList')->middleware('role');
    Route::get('/NewsClassListAllSon','IndexController@NewsClassListAllSon');
    Route::any('/newsEdit/{news}','IndexController@newsEdit');
    Route::any('/getnewsEdit/{news}','IndexController@getnewsEdit')->name('getnewsEdit')->middleware('role');
    Route::get('/createNewAdminIndex','IndexController@createNewAdminIndex');
    Route::any('/createNewAdmin','IndexController@createNewAdmin');

    /*
     *
     */
    Route::get('/MemberNewsAdminList','IndexController@MemberNewsAdminList')->name('MemberNewsAdminList')->middleware('role');
    Route::any('/deleteMemberNewsAdminList','IndexController@deleteMemberNewsAdminList')->name('deleteMemberNewsAdminList')->middleware('role');

    Route::any('/getnewsEditMemberNews/{userNews}','IndexController@getnewsEditMemberNews');

    Route::any('/getnewsEditMemberNewsAdminList/{userNews}','IndexController@getnewsEditMemberNewsAdminList')->name('getnewsEditMember');

    Route::any('/shoulu','IndexController@shoulu')->name('shoulu')->middleware('role');


    Route::any('/getUserList/{id?}','IndexController@getUserList');


    Route::any('/jiedu/{news}','IndexController@jiedu');
    Route::any('/getjiedu/{news}','IndexController@getjiedu');
    Route::any('/deleteJiedusId','IndexController@deleteJiedusId');
    Route::any('/updateJiedu','IndexController@updateJiedu');
    Route::any('/createJiedu','IndexController@createJiedu');



    Route::any('/updateNewAdmin','IndexController@updateNewAdmin');
    Route::any('/updateMemberNewAdmin','IndexController@updateMemberNewAdmin');
    Route::get('/MemberNewsAdmin','IndexController@MemberNewsAdmin');

    Route::get('/NewsSubClass','IndexController@NewsSubClass');
    Route::get('/tagEdit','IndexController@tagEdit');
    Route::get('/batchImport','IndexController@batchImport');


});


/*
 * 广告管理
 */
Route::group(['namespace'=>'Advertise','prefix'=>'advertise'],function (){
    Route::get('/indexAd','IndexController@indexAd');

    Route::get('/getAdvertisingBy','IndexController@getAdvertisingBy')->name('getAdvertisingBy')->middleware("role");
    Route::any('/deleteAdvertising','IndexController@deleteAdvertising')->name('deleteAdvertising')->middleware('role');
    Route::any('/createAdvertising','IndexController@createAdvertising')->name('createAdvertising')->middleware("role");
    Route::any('/updateAdvertising','IndexController@updateAdvertising')->name('updateAdvertising')->middleware("role");
});

/*
 *系统管理
 */
Route::group(['namespace'=>'System','prefix'=>'system'],function (){

    Route::get('/systemConfig','IndexController@systemConfig');

    Route::get('/systemSetup','IndexController@systemSetup');

    Route::get('/ManageFunSet','IndexController@ManageFunSet');


    Route::get('/getManageFunSetList','IndexController@getManageFunSetList')->name('getManageFunSetList')->middleware('role');
    Route::any('/createManageFunSetListId','IndexController@createManageFunSetListId')->name('createManageFunSetListId')->middleware('role');
    Route::any('/updateManageFunSetListId','IndexController@updateManageFunSetListId')->name('updateManageFunSetListId')->middleware('role');
    Route::any('/deleteManageFunSetListId','IndexController@deleteManageFunSetListId')->name('deleteManageFunSetListId')->middleware('role');

    Route::get('/getManageFunSetList','IndexController@getManageFunSetList')->name('getManageFunSetList');
    Route::any('/createManageFunSetListId','IndexController@createManageFunSetListId')->name('createManageFunSetListId');
    Route::any('/updateManageFunSetListId','IndexController@updateManageFunSetListId')->name('updateManageFunSetListId');
    Route::any('/deleteManageFunSetListId','IndexController@deleteManageFunSetListId')->name('deleteManageFunSetListId');


    Route::get('/ManageFunSets/{id}','IndexController@ManageFunSets');
    Route::get('/ManageFunSetsList/{id}','IndexController@ManageFunSetsList');
    Route::get('/ManageFunSetsLists/{id}','IndexController@ManageFunSetsLists');
    Route::any('/updateManageFunSetsLists','IndexController@updateManageFunSetsLists');


    Route::get('/ManageFunSetOk/{id}','IndexController@ManageFunSetOk');
    Route::get('/getRole_fun/','IndexController@getRole_fun');

    Route::get('/getRole/{id}','IndexController@getRole')->name('getRole')->middleware('role');
    Route::post('/updateRoleIds','IndexController@updateRoleIds');
    Route::get('/getRolesTrue/{id}','IndexController@getRolesTrue')->name('getRolesTrue')->middleware('role');


    Route::get('/getSystemSetupList/','IndexController@getSystemSetupList')->name('getSystemSetupList')->middleware('role');
    Route::any('/updateSystemSetupList/','IndexController@updateSystemSetupList')->name('updateSystemSetupList')->middleware('role');

    Route::get('/getRole/{id}','IndexController@getRole')->name('getRole');

    Route::get('/suggest','IndexController@suggest')->name('suggest');
    Route::get('/suggestList','IndexController@suggestList')->name('suggestList');


    Route::get('/systemLog','IndexController@systemLog');
    Route::get('/systemLogLists','IndexController@systemLogLists');


});
