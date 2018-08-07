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
Route::get('/', function () {
    return view('login');

});// Authentication routes...
Route::get('auth/register', function() {
    return view('/register');
});

Route::get('/register_tenant', 'TenantController@tenantRegistration');
Route::post('select_category_ajax', ['as'=>'select-ajax','uses'=>'TenantController@select_category_ajax']);
Route::post('select_location_ajax', ['as'=>'select-ajax','uses'=>'TenantController@select_location_ajax']);
Route::post('select_price_ajax', ['as'=>'select-ajax','uses'=>'TenantController@select_price_ajax']);

Route::post('register_tenant', 'TenantController@addtenantRegistration');


Route::get('/reset', function() {
   return view('reset-password');
});
Route::post('/registerAgent','AccountController@addAgent');
Route::group(['prefix' => 'agent',  'middleware' => 'auth'], function()
{
    Route::get('/', 'AgentController@dashboard');
    Route::get('tenant_list', 'AgentController@tenants');
    Route::get('add_tenants', 'AgentController@tenantForm');
    Route::post('select_category_ajax', ['as'=>'select-ajax','uses'=>'AgentController@select_category_ajax']);
    Route::post('select_location_ajax', ['as'=>'select-ajax','uses'=>'AgentController@select_location_ajax']);
    Route::post('select_price_ajax', ['as'=>'select-ajax','uses'=>'AgentController@select_price_ajax']);
    Route::post('add_tenants', 'AgentController@addTenant');
    Route::get('viewTenant/{id}', 'AgentController@viewTenant');
    Route::get('editTenant/{id}', 'AgentController@editTenant');
    Route::post('updateTenant/{id}', 'AgentController@updateTenant');
    //Route to display pages
    //Assets
    Route::get('add_assets', 'AssetsController@create')->name('add_assets');
    Route::get('assets_list', 'AssetsController@index')->name('assets_list');
    Route::post('add_assets', 'AssetsController@store')->name('agent/assets_list');
    Route::get('edit_assets/{id}', [ 'as' => 'agent/edit_assets', 'uses' => 'AssetsController@edit']);
    Route::patch('edit_assets/{id}', 'AssetsController@update');
    //Tenants
    Route::get('edit_tenant', 'ViewController@editTenant');
    Route::get('view_tenant/{id}', 'AgentController@viewTenant');
    //Asset Tenant
    Route::get('tenantProperty_list', 'AssetTenantController@index')->name('/tenantPropety_list');
    Route::get('add_tenantProperty', 'AssetTenantController@create')->name('/add_tenantProperty');
    Route::post('select_category_ajax', ['as'=>'select-ajax','uses'=>'AssetTenantController@select_category_ajax']);
    Route::post('select_location_ajax', ['as'=>'select-ajax','uses'=>'AssetTenantController@select_location_ajax']);
    Route::post('select_price_ajax', ['as'=>'select-ajax','uses'=>'AssetTenantController@select_price_ajax']);
    Route::post('add_tenantProperty', 'AssetTenantController@store');
    Route::get('edit_tenantProperty/{id}', [ 'as' => 'agent/edit_tenantProperty', 'uses' => 'AssetTenantController@edit']);
    Route::patch('edit_tenantProperty/{id}', 'AssetTenantController@update');
   //maintenance
    Route::get('maintenance_list', 'MaintenanceController@index')->name('/maintenance_list');
    Route::get('add_maintenance', 'MaintenanceController@create')->name('add_maintenance');
    Route::post('select_asset_ajax', ['as'=>'select-ajax','uses'=>'MaintenanceController@select_asset_ajax']);
    Route::post('add_maintenance', 'MaintenanceController@store');
    Route::get('edit_maintenance/{id}', [ 'as' => 'agent/edit_maintenance', 'uses' => 'MaintenanceController@edit']);
    Route::patch('edit_maintenance/{id}',  'MaintenanceController@update');
    //Debit
    Route::get('debit_list', 'AssetTenantController@showDebitList');
    Route::get('payment', 'ViewController@showPayment');
    Route::get('edit_debt', 'ViewController@showEditDebit');
    Route::get('add_debit', 'ViewController@addDebit');
    //Profile
    Route::get('profile', 'ViewController@showProfile');
    //Report
    Route::get('assets_report', 'AssetTenantController@assetsReport');
    Route::get('maintenance_report', 'AssetTenantController@maintenanceReport');
    Route::get('payments_report', 'AssetTenantController@paymentsReport');
    Route::get('legal', 'AssetTenantController@legal');
    //Notification
    Route::get('notification_list', 'ViewController@showNotificationList');
    Route::get('notification_view', 'ViewController@showNotificationview');
});
Route::group(['prefix' => 'tenant',  'middleware' => 'auth'], function()
{
    Route::get('profile', 'TenantController@profile');
    Route::post('profile', 'TenantController@storeProfile');
    Route::get('rent', 'TenantController@rent');
    Route::get('referrals', 'TenantController@referrals');
    //Tenant Maintenance
    Route::get('maintenance', 'TenantController@maintenance');
    Route::get('addMaintenance', 'TenantController@addMaintenance');
    Route::post('addMaintenance', 'TenantController@storeMaintenance');
    Route::get('payment', 'TenantController@payment');
    Route::get('viewMaintenance', 'TenantController@viewMaintenance');
    Route::get('notification', 'TenantController@notification');
});

Route::get('auth/login', function (){
    return view('login');
})->name('login');
Route::post('auth/login', 'AccountController@login');
Route::get('auth/logout', 'AccountController@logout')->name('logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');