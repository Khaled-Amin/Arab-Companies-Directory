<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/goWebscrapping', [App\Http\Controllers\webScrapping::class, 'goWebscrapping'])->name('goWebscrapping');
Route::get('/indexWebscrapping', [App\Http\Controllers\webScrapping::class, 'indexWebscrapping'])->name('indexWebscrapping');
Route::get('/ex', [App\Http\Controllers\webScrapping::class, 'ex'])->name('ex');

Route::get('/makeemail', function () {
    Artisan::call(' make:mail myEmail');
    return 'cache cache has clear successfully !';
});

Route::get('/', [App\Http\Controllers\HomePageCompany\HomePageController::class, 'HomePage'])->name('HomePage');
Route::get('/{linkCountry}.html', [App\Http\Controllers\HomePageCompany\HomePageController::class, 'HomePageCountry'])->name('HomePageWithCountry');
Route::get('/{nameCountry}/{ClassName}.html', [App\Http\Controllers\classes\ClassController::class, 'goToClasses'])->name('goToClasses');
Route::get('/companydetails/get/{nameCompany}.html', [App\Http\Controllers\createCompany\detailsController::class, 'getDetails'])->name('showLatestResult');
Route::get('/pindPage/{pindPageHref}/{id}', [App\Http\Controllers\showPindpage\showPindPageController::class, 'showPindPage'])->name('pindPage');
Route::get('/redirect', [App\Http\Controllers\redirectToAddCompanyController::class, 'redirct'])->name('redirect');
Route::get('/gt-filter/{nameCountry}/{className}', [App\Http\Controllers\classes\ClassController::class, 'goToFilter'])->name('goToFilter');
Route::get('/filter/{nameCountry}/{className}', [App\Http\Controllers\classes\ClassController::class, 'filterData'])->name('filterData');

Auth::routes();

Route::get('/select-unique-people', [App\Http\Controllers\uniquePeoples::class, 'selectUniquePeople'])->name('selectUniquePeople');
Route::post('/set-Unique-People', [App\Http\Controllers\uniquePeoples::class, 'setUniquePeople'])->name('setUniquePeople');

#######################################################################  أدخال شركة##########################################################/
Route::get('/log-in', [App\Http\Controllers\User_auth\LoginUserController::class, 'logIn'])->name('logIn');
Route::post('/add-company', [App\Http\Controllers\User_auth\LoginUserController::class, 'setlogIn'])->name('setLogIn');
Route::get('/rigesteration', [App\Http\Controllers\User_auth\RegisterUserController::class, 'registerCompany'])->name('registerCompany');
Route::post('/add-company-rigesteration', [App\Http\Controllers\User_auth\RegisterUserController::class, 'setRigester'])->name('setRigester');
Route::get('/company-details', [App\Http\Controllers\createCompany\showAddCompanyView::class, 'viewAddCompany'])->name('viewAddCompany');
Route::get('/viewCompanywithoutEdit', [App\Http\Controllers\createCompany\showAddCompanyView::class, 'viewAddCompanyWithoutSession'])->name('viewAddCompanyWithoutSession');
Route::get('/searchCompany', [App\Http\Controllers\dashboard\companyController::class, 'searchCompany'])->name('searchCompany');
Route::get('/goForgetPassword', [App\Http\Controllers\User_auth\LoginUserController::class, 'goForgetPassword'])->name('goForgetPassword');
Route::get('/setEmailForForgetPassword', [App\Http\Controllers\User_auth\LoginUserController::class, 'setEmailForForgetPassword'])->name('setEmailForForgetPassword');

Route::post('/add-new-company', [App\Http\Controllers\createCompany\createCompany::class, 'AddOrUpdateCompany'])->name('AddOrUpdateCompany');
#######################################################################  نهاية أدخال شركة  ##########################################################/
#######################################################################  بروفايل  #########################################################
Route::get('/profileShow', [App\Http\Controllers\User_auth\profileShowController::class, 'profileShow'])->name('profileShow');
Route::get('/editData', [App\Http\Controllers\User_auth\profileShowController::class, 'editData'])->name('editData');
Route::get('/show-my-company', [App\Http\Controllers\User_auth\profileShowController::class, 'show_my_company'])->name('show_my_company');
Route::post('/Update-User', [App\Http\Controllers\User_auth\profileShowController::class, 'AddOrUpdateUser'])->name('AddOrUpdateUser');
Route::post('/log-Out-Profile', [App\Http\Controllers\User_auth\profileShowController::class, 'logOutProfile'])->name('logOutProfile');
Route::get('/log-Out-personal', [App\Http\Controllers\User_auth\profileShowController::class, 'logOutPersonal'])->name('logOutPersonal');
#######################################################################  نهاية البروفايل  #########################################################
####################################################################### للمستخدم مع التعديل أ دخال شركة#######################################################

Route::get('/show-Company-with-Edit', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'showCompanywithEdit'])->name('showCompanywithEdit');
Route::get('/create-Company-with-Edit', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'createCompanywithEdit'])->name('createCompanywithEdit');
Route::post('/store-Company-For-User', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'storeCompanyForUser'])->name('storeCompanyForUser');
Route::get('/edit-Company-with-Edit/{id}', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'editCompanywithEdit'])->name('editCompanywithEdit');
Route::post('/update-Company-For-User/{id}', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'updateCompanyForUser'])->name('updateCompanyForUser');
Route::get('/deleteCompanyForUser/{id}', [App\Http\Controllers\createCompany\createCompanywithEditUser::class, 'deleteCompanyForUser'])->name('deleteCompanyForUser');
####################################################################### للمستخدم مع التعديل أ دخال شركة#######################################################
#######################################################################  عرض التصنيفات الفرعية ##########################################################/
Route::get('sub/{nameCountry}/{ClassName}/{nameSubclass}.html', [App\Http\Controllers\classes\ClassController::class, 'goToSubclass'])->name('goToSubclass');
#######################################################################  نهاية  التصنيفات الفرعية ##########################################################/


###
#######################################################################  أدخال الانتظار##########################################################/

Route::get('/viewCompanyWaitting', [App\Http\Controllers\dashboard\companyController::class, 'viewCompanyWaitting'])->name('viewCompanyWaitting');
Route::get('/toShow/{id}', [App\Http\Controllers\dashboard\companyController::class, 'toShow'])->name('toShow');

#######################################################################  نهاية  الانتظار##########################################################/
####################################################################  المدن  ##########################################################/

Route::get('/city/pages/all', [App\Http\Controllers\dashboard\cityController::class, 'index'])->name('city');
Route::get('/city/create/page/', [App\Http\Controllers\dashboard\cityController::class, 'createCity'])->name('createCity');
Route::post('/city/store/page/', [App\Http\Controllers\dashboard\cityController::class, 'storeCity'])->name('storeCity');
Route::get('/city/edit/page/{id}', [App\Http\Controllers\dashboard\cityController::class, 'editCity'])->name('editCity');
Route::post('/city/update/page/{id}', [App\Http\Controllers\dashboard\cityController::class, 'updateCity'])->name('updateCity');
Route::get('/city/delete/page/{id}', [App\Http\Controllers\dashboard\cityController::class, 'deleteCity'])->name('deleteCity');
####################################################################  انهاية  المدن ##########################################################/

#######################################################################  الصفحة الرئيسية ##########################################################/
Route::get('/cp', [App\Http\Controllers\HomeController::class, 'Rtl'])->name('Rtl');
####################################################################### نهاية الصفحة الرئيسية ##########################################################/


####################################################################  الاعدادات العامة ##########################################################/
Route::get('/sittings', [App\Http\Controllers\dashboard\sittingController::class, 'getDataSittings'])->name('sittings');
Route::post('/setter', [App\Http\Controllers\dashboard\sittingController::class, 'setSittings'])->name('setSittings');
#######################################################################  نهاية الاعدادات العامة ##########################################################/


####################################################################  البحث  ##########################################################/

Route::post('/search', [App\Http\Controllers\search\searchController::class, 'search'])->name('search');
####################################################################  نهاية البحث  ##########################################################/

####################################################################  الاعلانات  ##########################################################/
Route::post('/setAdd', [App\Http\Controllers\dashboard\setAddsController::class, 'setAdd'])->name('setAdd');
Route::get('/AddControl', [App\Http\Controllers\dashboard\setAddsController::class, 'AddControl'])->name('AddControl');
####################################################################  انهاية الاعلانات ########################################################

Route::post('/getCities', [App\Http\Controllers\dashboard\companyController::class, 'getCities'])->name('getCities');


##/
Route::get('/{nameCountry}/{ClassName}/{id}.html', [App\Http\Controllers\createCompany\detailsController::class, 'getDetails'])->name('getDetails');
Route::get('/{id}/{nameCompany}', [App\Http\Controllers\createCompany\detailsController::class, 'viewDetails'])->name('viewDetails');

Route::get('/getDetails/{id}', [App\Http\Controllers\createCompany\detailsController::class, 'getDetail'])->name('getDetail');
Route::get('/show/Result/Tag/{name_tag}', [App\Http\Controllers\createCompany\detailsController::class, 'showResultTag'])->name('showResultTag');
####################################################################  التصنيفات الرئيسية  ##########################################################/

Route::get('/mainClass/pages/all', [App\Http\Controllers\dashboard\MainClassController::class, 'index'])->name('MainClass');
Route::get('/mainClass/create/page/', [App\Http\Controllers\dashboard\MainClassController::class, 'createMainClass'])->name('createMainClass');
Route::post('/mainClass/store/page/', [App\Http\Controllers\dashboard\MainClassController::class, 'storeMainClass'])->name('storeMainClass');
Route::get('/mainClass/edit/page/{id}', [App\Http\Controllers\dashboard\MainClassController::class, 'editMainClass'])->name('editMainClass');
Route::post('/mainClass/update/page/{id}', [App\Http\Controllers\dashboard\MainClassController::class, 'updateMainClass'])->name('updateMainClass');
Route::get('/mainClass/delete/page/{id}', [App\Http\Controllers\dashboard\MainClassController::class, 'deleteMainClass'])->name('deleteMainClass');
####################################################################  انهاية التصنيفات الرئيسية ##########################################################/

####################################################################  الشركات  ##########################################################/

Route::get('/company/pages/all', [App\Http\Controllers\dashboard\companyController::class, 'index'])->name('companies');
Route::get('/company/create/page/', [App\Http\Controllers\dashboard\companyController::class, 'createCompany'])->name('createCompany');
Route::post('/company/store/page/', [App\Http\Controllers\dashboard\companyController::class, 'storeCompany'])->name('storeCompany');
Route::get('/company/edit/page/{id}', [App\Http\Controllers\dashboard\companyController::class, 'editCompany'])->name('editCompany');
Route::post('/company/update/page/{id}', [App\Http\Controllers\dashboard\companyController::class, 'updateCompany'])->name('updateCompany');
Route::get('/company/delete/page/{id}', [App\Http\Controllers\dashboard\companyController::class, 'deleteCompany'])->name('deleteCompany');
####################################################################  انهاية  الشركات ##########################################################/


####################################################################  التصنيفات الفرعية  ##########################################################/

Route::get('/subClass/pages/all', [App\Http\Controllers\dashboard\subClassController::class, 'index'])->name('SubClass');
Route::get('/subClass/create/page/', [App\Http\Controllers\dashboard\subClassController::class, 'createSubClass'])->name('createSubClass');
Route::post('/subClass/store/page/', [App\Http\Controllers\dashboard\subClassController::class, 'storeSubClass'])->name('storeSubClass');
Route::get('/subClass/edit/page/{id}', [App\Http\Controllers\dashboard\subClassController::class, 'editSubClass'])->name('editSubClass');
Route::post('/subClass/update/page/{id}', [App\Http\Controllers\dashboard\subClassController::class, 'updateSubClass'])->name('updateSubClass');
Route::get('/subClass/delete/page/{id}', [App\Http\Controllers\dashboard\subClassController::class, 'deleteSubClass'])->name('deleteSubClass');
####################################################################  انهاية التصنيفات الفرعية ##########################################################/

####################################################################  صفحات الثابتة  ##########################################################/
Route::get('/pindpage/view', [App\Http\Controllers\HomePageCompany\HomePageController::class, 'pindPagePage'])->name('pindPagePage');

Route::get('/pindpage/all/getpind', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'indexPage'])->name('main_pagess');
Route::get('/pindpage/create/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'create'])->name('create_Page');
Route::post('/pindpage/store/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'store'])->name('create_store');
Route::get('/pindpage/edit/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'edit'])->name('edit_Page');
Route::post('/pindpage/update/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'update'])->name('update_Page');
Route::get('/pindpage/delete/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'destroy'])->name('delete_Page');
#################################################################### نهاية صفحات الثابتة  ##########################################################/


####################################################################  التصنيفات  ##########################################################/

Route::get('categories' ,  [App\Http\Controllers\dashboard\CategoryController::class, 'index'])->name('categories.main');
Route::get('categories/create' , [App\Http\Controllers\dashboard\CategoryController::class, 'create'])->name('categories.create');
Route::match(['get', 'post'],'categories/store', [App\Http\Controllers\dashboard\CategoryController::class , 'store'])->name('categories.store');
Route::get('categories/edit/{id}' , [App\Http\Controllers\dashboard\CategoryController::class, 'edit'])->name('categories.edit');
Route::match(['post' , 'put'],'categories/update/{id}' , [App\Http\Controllers\dashboard\CategoryController::class, 'update'])->name('categories.update');
Route::match(['head' , 'delete'],'categories/destroy/{id}', [App\Http\Controllers\dashboard\CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('supcate/', [App\Http\Controllers\dashboard\CategoryController::class , 'supCate'])->name('supcate');

####################################################################  نهاية التصنيفات  ##########################################################/



####################################################################  الدول  ##########################################################/

Route::get('countries' ,  [App\Http\Controllers\dashboard\countryCountroller::class, 'showCountries'])->name('showCountries');
Route::get('AddCountry' ,  [App\Http\Controllers\dashboard\countryCountroller::class, 'AddCountry'])->name('AddCountry');
Route::post('add' ,  [App\Http\Controllers\dashboard\countryCountroller::class, 'actionAddCountry'])->name('actionAddCountry');
Route::get('update/contries/{id}' ,  [App\Http\Controllers\dashboard\countryCountroller::class, 'editCountry'])->name('editCountry');
Route::get('destroy/contries/{id}' ,  [App\Http\Controllers\dashboard\countryCountroller::class, 'destroy'])->name('destroyContry');

Route::match(['post' , 'put'],'countries/update/{id}' , [App\Http\Controllers\dashboard\countryCountroller::class, 'updateCountry'])->name('updateCountry');

#################################################################### نهاية الدول  ##########################################################/

####################################################################   عرض الاعضاء ########################################################
Route::get('showUsers' ,  [App\Http\Controllers\dashboard\userController::class, 'showUsers'])->name('userCompany');
Route::get('destroyUser/finsh/{id}' ,  [App\Http\Controllers\dashboard\userController::class, 'destroy'])->name('destroy');
Route::get('searchUser' ,  [App\Http\Controllers\dashboard\userController::class, 'searchUser'])->name('searchUser');
Route::get('goToUniqueMember/edit/{id}' ,  [App\Http\Controllers\dashboard\userController::class, 'goToUniqueMember'])->name('goToUniqueMember');
Route::get('uniqueMember' ,  [App\Http\Controllers\dashboard\userController::class, 'uniqueMember'])->name('uniqueMember');

#################################################################### نهاية عرض الاعضاء  ########################################################

#################################################################### تمييز ادخال الاعضاء  ########################################################
Route::get('showCustomizeUsers' ,  [App\Http\Controllers\dashboard\userController::class, 'showCustomizeUsers'])->name('showCustomizeUsers');
Route::post('customizeUsers1' ,  [App\Http\Controllers\dashboard\userController::class, 'customizeUsers1'])->name('customizeUsers1');
Route::post('customizeUsers2' ,  [App\Http\Controllers\dashboard\userController::class, 'customizeUsers2'])->name('customizeUsers2');
Route::post('customizeUsers3' ,  [App\Http\Controllers\dashboard\userController::class, 'customizeUsers3'])->name('customizeUsers3');
Route::post('customizeUsers4' ,  [App\Http\Controllers\dashboard\userController::class, 'customizeUsers4'])->name('customizeUsers4');

#################################################################### نهاية تمييز ادخال الاعضاء  ######################################################

// ####################################################################  الصفحات  ##########################################################/

// Route::get('pages' ,  [App\Http\Controllers\dashboard\PageController::class, 'index'])->name('pages.main');
// Route::get('pages/create' , [App\Http\Controllers\dashboard\PageController::class, 'create'])->name('pages.create');
// Route::match(['get', 'post'],'pages/store', [App\Http\Controllers\dashboard\PageController::class , 'store'])->name('pages.store');
// Route::get('pages/edit/{id}' , [App\Http\Controllers\dashboard\PageController::class, 'edit'])->name('pages.edit');
// Route::match(['post' , 'put'],'pages/update/{id}' , [App\Http\Controllers\dashboard\PageController::class, 'update'])->name('pages.update');
// Route::get('pages/show/{id}' , [App\Http\Controllers\dashboard\PageController::class, 'show'])->name('pages.show');
// Route::get('pages/destroy/{id}', [App\Http\Controllers\dashboard\PageController::class, 'destroy'])->name('pages.destroy');

// #################################################################### نهاية الصفحات  ##########################################################/

// #################################################################### المواقع  ##########################################################/

// Route::get('sites' ,  [App\Http\Controllers\dashboard\SitesController::class, 'index'])->name('sites.main');
// Route::get('sites/create' , [App\Http\Controllers\dashboard\SitesController::class, 'create'])->name('sites.create');
// Route::match(['get', 'post'],'sites/store', [App\Http\Controllers\dashboard\SitesController::class , 'store'])->name('sites.store');
// Route::get('sites/edit/{id}' , [App\Http\Controllers\dashboard\SitesController::class, 'edit'])->name('sites.edit');
// Route::match(['post' , 'put'],'sites/update/{id}' , [App\Http\Controllers\dashboard\SitesController::class, 'update'])->name('sites.update');
// Route::get('sites/show/{id}' , [App\Http\Controllers\dashboard\SitesController::class, 'show'])->name('sites.show');
// Route::get('sites/destroy/{id}', [App\Http\Controllers\dashboard\SitesController::class, 'destroy'])->name('sites.destroy');
// Route::post('supcate/', [App\Http\Controllers\dashboard\CategoryController::class , 'supCate'])->name('supcate');


// #################################################################### نهاية المواقع  ##########################################################/



#################################################################### صفحة الموقع الرئيسية  ##########################################################/

// Route::get('HomePage' ,  [App\Http\Controllers\dalil\dalilController::class, 'HomePage'])->name('HomePage');


#################################################################### نهاية صفحة الموقع الرئيسية  ##########################################################/
