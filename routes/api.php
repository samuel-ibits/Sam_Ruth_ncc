<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('lgabystateid/{state}', 'LgaController@GetLgabyStateId');
Route::prefix('tenants')->group(function () {
    Route::get('/', 'TenantController@index');
    Route::get('searchtenantbyname/{tenant}', 'TenantController@searchtenantbyname');
});
Route::prefix('powers')->group(function () {
    Route::get('getpowersuppliersbypowersuppliertypeid/{powersuppliertype}', 'PowerController@getpowersuppliersbypowersuppliertypeid');
});

Route::prefix('towers')->group(function () {
    Route::get('gettowerinsurancebyid/{towerinsuranceid}', 'TowerController@gettowerinsurancebyid');
    Route::get('gettenanttowerbyid/{tenanttowerid}', 'TowerController@gettenanttowerbyid');
    Route::get('getauditagenttowerbyid/{auditagenttowerid}', 'TowerController@getauditagenttowerbyid');
    
});

Route::prefix('antennas')->group(function () {
    Route::get('searchantennamakebyname/{antennamake}', 'AntennaController@searchantennamakebyname');
    Route::get('searchantennamodelbyname/{antennamodel}', 'AntennaController@searchantennamodelbyname');
});

Route::prefix('maintenances')->group(function () {
    Route::get('searchmaintenanceagentbyname/{maintenanceagentname}', 'MaintenanceController@searchmaintenanceagentbyname');
    Route::get('searchmaintenanceengineerbynameandagentid/{maintenanceengineername}/{maintenanceagentid}', 'MaintenanceController@searchmaintenanceengineerbynameandagentid');
});

Route::prefix('audits')->group(function () {
    Route::get('searchauditagentbyname/{auditagentname}', 'AuditController@searchauditagentbyname');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
