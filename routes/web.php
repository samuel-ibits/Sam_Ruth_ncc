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

// Example Routes

Route::view('/', 'landing');


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::view('/helpdesk', 'helpdesk');
    // Route::match(['get', 'post'], '/dashboards', function(){
    //     return view('dashboard');
    // });

    Route::view('/examples/plugin-helper', 'examples.plugin_helper');
    Route::view('/examples/plugin-init', 'examples.plugin_init');
    Route::view('/examples/blank', 'examples.blank');

    Route::view('/users', 'user.user-type');
    Route::view('/user/myprofile', 'user.towerrepprofile');
    Route::view('/user/createuser', 'user.create-user');

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/index', 'AdminController@index')->name('admin');
    Route::view('/admin/towers/', 'admin.towers.index');
    Route::view('/admin/towers/index', 'admin.towers.index');

    Route::view('/admin/towers/createtower/step1', 'admin.towers.createtower');
    Route::view('/admin/towers/createtower/step2', 'admin.towers.createtower');
    Route::view('/admin/towers/createtower/step3', 'admin.towers.createtower');
    Route::view('/admin/towers/createtower/step4', 'admin.towers.createtower');
    Route::view('/admin/towers/createtower/step5', 'admin.towers.createtower');

    Route::view('/admin/tenants/', 'admin.tenants.index');
    Route::view('/admin/tenants/index', 'admin.tenants.index');

    Route::view('/admin/audits/', 'admin.audits.index');
    Route::view('/admin/audits/index', 'admin.audits.index');

    Route::view('/admin/insurances/', 'admin.insurances.index');
    Route::view('/admin/insurances/index', 'admin.insurances.index');

    Route::view('/admin/maintenances/', 'admin.maintenances.index');
    Route::view('/admin/maintenances/index', 'admin.maintenances.index');
    Route::middleware('is_admin')->group(function () {
        Route::resource('portalsettings/menus', 'PortalSetting\MenuController');
        Route::resource('portalsettings/submenus', 'PortalSetting\SubmenuController');
        Route::resource('portalsettings/roles', 'PortalSetting\RoleController');
        Route::resource('portalsettings/users', 'PortalSetting\UserController');
        Route::resource('portalsettings/permissions', 'PortalSetting\PermissionController');
        Route::get('portalsettings/users.create', 'PortalSetting\PermissionController@create')->name('register');
    });

    Route::get('dashboards/index', 'Dashboard\IndexController@Index')->name('dashboards');
    Route::get('dashboards', 'Dashboard\IndexController@Index')->name('dashboards');
    Route::get('dashboards/user', 'Dashboard\UserController@Index')->name('user.dashboards');
    Route::get('dashboards/admin', 'Dashboard\AdminController@Index')->name('admin.dashboards');
    Route::resource('towers', 'TowerController');
    Route::post('towers/checkiftowernameexists', 'TowerController@checkiftowernameexists');
    Route::post('towers/checkifnccidentityexists', 'TowerController@checkifnccidentityexists');
    Route::post('towers/checkduplicategeoposition', 'TowerController@checkduplicategeoposition');
    Route::delete('towers/deletetowerinsurance/{towerinsuranceid}', 'TowerController@deletetowerinsurance')->name('towers.deletetowerinsurance');
    Route::delete('towers/deletetowertenant/{towertenantid}', 'TowerController@deletetowertenant')->name('towers.deletetowertenant');
    Route::post('towers/addtowerinsurance/{towerid}', 'TowerController@addtowerinsurance')->name('towers.addtowerinsurance');
    Route::post('towers/addtowertenant/{towerid}', 'TowerController@addtowertenant')->name('towers.addtowertenant');
    Route::post('towers/addtowermaintenance/{towerid}', 'TowerController@addtowermaintenance')->name('towers.addtowermaintenance');
    Route::post('towers/addtowerauditschedule/{towerid}', 'TowerController@addtowerauditschedule')->name('towers.addtowerauditschedule');
    Route::put('users/updatepassword', 'PortalSetting\UserController@updatepassword')->name('user.updatepassword');
    Route::put('towers/{towerinsuranceid}/updatetowerinsurance', 'TowerController@updatetowerinsurance')->name('towers.updatetowerinsurance');
    Route::put('towers/{towermaintenanceid}/updatetowermaintenance', 'TowerController@updatetowermaintenance')->name('towers.updatetowermaintenance');
    Route::put('towers/{tenanttowerid}/updatetenanttower', 'TowerController@updatetenanttower')->name('towers.updatetenanttower');
    Route::put('towers/{auditagenttowerid}/updatetowerauditschedule', 'TowerController@updatetowerauditschedule')->name('towers.updatetowerauditschedule');

    Route::get('dashboards/index', 'Dashboard\IndexController@index')->name('dashboards.index');

    Route::get('reports/towers', 'Report\TowerController@index')->name('reports.towers.index');
    Route::get('reports/towers/index', 'Report\TowerController@index')->name('reports.towers.index');
    Route::get('reports/audits', 'Report\AuditController@index')->name('reports.audits.index');
    Route::get('reports/audits/index', 'Report\AuditController@index')->name('reports.audits.index');
    Route::get('reports/maintenances', 'Report\MaintenanceController@index')->name('reports.maintenances.index');
    Route::get('reports/maintenances/index', 'Report\MaintenanceController@index')->name('reports.maintenances.index');
    Route::get('reports/tenants', 'Report\TenantController@index')->name('reports.tenants.index');
    Route::get('reports/tenants/index', 'Report\TenantController@index')->name('reports.tenants.index');
    Route::get('reports/insurances', 'Report\InsuranceController@index')->name('reports.insurances.index');
    Route::get('reports/insurances/index', 'Report\InsuranceController@index')->name('reports.insurances.index');
    Route::post('reports/towers/', 'TowerController@search') -> name('search');
    // Route::post('report','App\Http\Controllers\employeeController@search')->name('search');

});

Route::put('email/verify/{id}/{hash}', 'Auth\VerificationController@update');
Auth::routes(['verify' => true]);
