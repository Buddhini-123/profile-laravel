<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@login');

Route::group(
    ['middleware' => 'auth'],
    function ($router) {
        Route::post('/savedata', 'App\Http\Controllers\UsersController@savedata')->name('savedata');
    }

);

/**
 * @auth
 */

Route::get('register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@store')->name('register');
Route::get('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@store')->name('login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail');
Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');


/**
 * @move
 */



Route::prefix('/permission')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\PermissionController@permissions')->name('permissions');
        Route::get('/find-permission', 'App\Http\Controllers\RoleController@delete');
        Route::get('/edit-permission/{id}', 'App\Http\Controllers\PermissionController@edit');
        Route::post('/update-permission/{id}', 'App\Http\Controllers\PermissionController@update');
        Route::get('/delete-permission/{id}', 'App\Http\Controllers\PermissionController@delete');
    }
);

Route::prefix('/role')->group(
    function () {
        Route::get('/', [App\Http\Controllers\RoleController::class, 'show']);
        Route::post('/roles', 'App\Http\Controllers\RoleController@roles')->name('roles');
        Route::get('/edit-roles/{id}', 'App\Http\Controllers\RoleController@edit');
        Route::post('/update-role/{id}', 'App\Http\Controllers\RoleController@update');
        Route::get('/delete-role/{id}', 'App\Http\Controllers\RoleController@delete');
    }
);

Route::prefix('/email')->group(
    function () {
        Route::get('show', 'App\Http\Controllers\EmailController@show');
        Route::get('edit/{id}', 'App\Http\Controllers\EmailController@edit');
        Route::get('edit', 'App\Http\Controllers\EmailController@edit');
        Route::get('/create', 'App\Http\Controllers\EmailController@create');
        Route::post('ajax-get', 'App\Http\Controllers\EmailController@ajaxGet');
        Route::post('store', 'App\Http\Controllers\EmailController@store');
    }
);
Route::prefix('/post')->group(
    function () {
        Route::get('show', 'App\Http\Controllers\PostController@show');
        Route::get('edit/{id}', 'App\Http\Controllers\PostController@edit');
        Route::get('edit', 'App\Http\Controllers\PostController@edit');
        Route::get('/create', 'App\Http\Controllers\PostController@create');
        Route::post('ajax-get', 'App\Http\Controllers\PostController@ajaxGet');
        Route::post('store', 'App\Http\Controllers\PostController@store');
    }
);


Route::prefix('/parameter')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ParametersController@index')->name('parameter.index');
        Route::post('/store', 'App\Http\Controllers\ParametersController@store')->name('parameter.store');
        Route::get('/create', 'App\Http\Controllers\ParametersController@create')->name('parameter.create');
        Route::get('/edit/{parameter}', 'App\Http\Controllers\ParametersController@edit')->name('parameter.edit');
        Route::patch('/edit/{parameter}', 'App\Http\Controllers\ParametersController@update')->name('parameter.update');
        Route::get('/show/{parameter}', 'App\Http\Controllers\ParametersController@show')->name('parameter.show');
        Route::delete('/delete/{parameter}', 'App\Http\Controllers\ParametersController@delete')->name('parameter.delete');
    }
);
Route::prefix('/user')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\UsersController@search')->name('user.index');
        Route::get('/search', 'App\Http\Controllers\UsersController@search');
        Route::get('/list', 'App\Http\Controllers\UsersController@list');
        Route::post('/list', 'App\Http\Controllers\UsersController@list');
        Route::post('/store', 'App\Http\Controllers\UsersController@store')->name('user.store');
        Route::get('/create', 'App\Http\Controllers\UsersController@create')->name('user.create');
        Route::get('/edit/{user}', 'App\Http\Controllers\UsersController@edit')->name('user.edit');
        Route::patch('/edit/{user}', 'App\Http\Controllers\UsersController@update')->name('user.update');
        Route::get('/show/{user}', 'App\Http\Controllers\UsersController@show')->name('user.show');
        Route::delete('/delete/{user}', 'App\Http\Controllers\UsersController@delete')->name('user.delete');
        Route::post('/change-profile-picture', 'App\Http\Controllers\UsersController@updateimage');
        Route::get('/result', 'App\Http\Controllers\UsersController@result')->name('user.result');
        Route::post('/user-logout', 'App\Http\Controllers\UsersController@logout');
        Route::post('/profile-validation', 'App\Http\Controllers\UsersController@user_profile_validate');

    }
);

Route::prefix('/delivery')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\DeliveryController@index')->name('delivery.index');
        Route::post('/store', 'App\Http\Controllers\DeliveryController@store')->name('delivery.store');
        Route::get('/create', 'App\Http\Controllers\DeliveryController@create')->name('delivery.create');
        Route::get('/edit/{delivery}', 'App\Http\Controllers\DeliveryController@edit')->name('delivery.edit');
        Route::patch('/edit/{delivery}', 'App\Http\Controllers\DeliveryController@update')->name('delivery.update');
        Route::get('/show/{delivery}', 'App\Http\Controllers\DeliveryController@show')->name('delivery.show');
        Route::delete('/delete/{delivery}', 'App\Http\Controllers\DeliveryController@delete')->name('delivery.delete');
        Route::post('/find-address', 'App\Http\Controllers\DeliveryController@find_address');
    }
);



Route::prefix('/product')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ProductController@index')->name('product.index');
        Route::post('/store', 'App\Http\Controllers\ProductController@store')->name('product.store');
        Route::get('/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
        Route::get('/edit/{product}', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
        Route::patch('/edit/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update');
        Route::get('/show/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show');
        Route::delete('/delete/{product}', 'App\Http\Controllers\ProductController@delete')->name('product.delete');
        Route::post('ajax-get', 'App\Http\Controllers\ProductController@ajaxGet');
    }
);

Route::prefix('/configuration')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ConfigurationController@index')->name('configuration.index');
        Route::post('/store', 'App\Http\Controllers\ConfigurationController@store')->name('configuration.store');
        Route::get('/create', 'App\Http\Controllers\ConfigurationController@create')->name('configuration.create');
        Route::get('/edit/{configuration}', 'App\Http\Controllers\ConfigurationController@edit')->name('configuration.edit');
        Route::patch('/edit/{configuration}', 'App\Http\Controllers\ConfigurationController@update')->name('configuration.update');
        Route::get('/show/{configuration}', 'App\Http\Controllers\ConfigurationController@show')->name('configuration.show');
        Route::delete('/delete/{configuration}', 'App\Http\Controllers\ConfigurationController@delete')->name('configuration.delete');
    }
);

Route::prefix('/templates')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\TemplateController@index')->name('templates.index');
        Route::post('/store', 'App\Http\Controllers\TemplateController@store')->name('templates.store');
        Route::get('/create', 'App\Http\Controllers\TemplateController@create')->name('templates.create');
        Route::get('/edit/{templates}', 'App\Http\Controllers\TemplateController@edit')->name('templates.edit');
        Route::patch('/edit/{templates}', 'App\Http\Controllers\TemplateController@update')->name('templates.update');
        Route::get('/show/{templates}', 'App\Http\Controllers\TemplateController@show')->name('templates.show');
        Route::delete('/delete/{templates}', 'App\Http\Controllers\TemplateController@delete')->name('templates.delete');
    }
);

Route::prefix('/statistics')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\StatisticController@index')->name('statistics.index');
        Route::get('/store', 'App\Http\Controllers\StatisticController@store')->name('statistics.store');
        Route::get('/create', 'App\Http\Controllers\StatisticController@create')->name('statistics.create');
        Route::get('/edit/{statistics}', 'App\Http\Controllers\StatisticController@edit')->name('statistics.edit');
        Route::patch('/edit/{statistics}', 'App\Http\Controllers\StatisticController@update')->name('statistics.update');
        Route::get('/show/{statistics}', 'App\Http\Controllers\StatisticController@show')->name('statistics.show');
        Route::get('/delete/{statistics}', 'App\Http\Controllers\StatisticController@destroy')->name('statistics.destroy');
        Route::get('/statistics-view', 'App\Http\Controllers\StatisticController@statistics_view')->name('statistics.statistics-view');
    }
);

Route::prefix('/general')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\GeneralController@index')->name('general.index');
        Route::post('/store', 'App\Http\Controllers\GeneralController@store')->name('general.store');
        Route::get('/create', 'App\Http\Controllers\GeneralController@create')->name('general.create');
        Route::get('/edit/{general}', 'App\Http\Controllers\GeneralController@edit')->name('general.edit');
        Route::patch('/edit/{general}', 'App\Http\Controllers\GeneralController@update')->name('general.update');
        Route::get('/show/{general}', 'App\Http\Controllers\GeneralController@show')->name('general.show');
        Route::delete('/delete/{general}', 'App\Http\Controllers\GeneralController@delete')->name('general.delete');
    }
);

Route::prefix('/csv_imports')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\CsvController@index')->name('csv_imports.index');
        Route::post('/store', 'App\Http\Controllers\CsvController@store')->name('csv_imports.store');
        Route::get('/create', 'App\Http\Controllers\CsvController@create')->name('csv_imports.create');
        Route::get('/edit/{csv_imports}', 'App\Http\Controllers\CsvController@edit')->name('csv_imports.edit');
        Route::patch('/edit/{csv_imports}', 'App\Http\Controllers\CsvController@update')->name('csv_imports.update');
        Route::get('/show/{csv_imports}', 'App\Http\Controllers\CsvController@show')->name('csv_imports.show');
        Route::delete('/delete/{csv_imports}', 'App\Http\Controllers\CsvController@delete')->name('csv_imports.delete');
    }
);

Route::prefix('/imports')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ImportController@index')->name('imports.index');
        Route::post('/store', 'App\Http\Controllers\ImportController@store')->name('imports.store');
        Route::get('/create', 'App\Http\Controllers\ImportController@create')->name('imports.create');
        Route::get('/edit/{imports}', 'App\Http\Controllers\ImportController@edit')->name('imports.edit');
        Route::patch('/edit/{imports}', 'App\Http\Controllers\ImportController@update')->name('imports.update');
        Route::get('/show/{imports}', 'App\Http\Controllers\ImportController@show')->name('imports.show');
        Route::delete('/delete/{imports}', 'App\Http\Controllers\ImportController@delete')->name('imports.delete');
    }
);

Route::prefix('/processor')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ProcessorController@index')->name('processor.index');
        Route::post('/store', 'App\Http\Controllers\ProcessorController@store')->name('processor.store');
        Route::get('/create', 'App\Http\Controllers\ProcessorController@create')->name('processor.create');
        Route::get('/edit/{processor}', 'App\Http\Controllers\ProcessorController@edit')->name('processor.edit');
        Route::patch('/edit/{processor}', 'App\Http\Controllers\ProcessorController@update')->name('processor.update');
        Route::get('/show/{processor}', 'App\Http\Controllers\ProcessorController@show')->name('processor.show');
        Route::delete('/delete/{processor}', 'App\Http\Controllers\ProcessorController@delete')->name('processor.delete');
    }
);

Route::prefix('/automation')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\AutomationController@index')->name('automation.index');
        Route::post('/store', 'App\Http\Controllers\AutomationController@store')->name('automation.store');
        Route::get('/create', 'App\Http\Controllers\AutomationController@create')->name('automation.create');
        Route::get('/edit/{automation}', 'App\Http\Controllers\AutomationController@edit')->name('automation.edit');
        Route::patch('/edit/{automation}', 'App\Http\Controllers\AutomationController@update')->name('automation.update');
        Route::get('/show/{automation}', 'App\Http\Controllers\AutomationController@show')->name('automation.show');
        Route::delete('/delete/{automation}', 'App\Http\Controllers\AutomationController@delete')->name('automation.delete');
    }
);

Route::prefix('/coupon')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\CouponController@index')->name('coupon.index');
        Route::post('/store', 'App\Http\Controllers\CouponController@store')->name('coupon.store');
        Route::get('/create', 'App\Http\Controllers\CouponController@create')->name('coupon.create');
        Route::get('/edit/{coupon}', 'App\Http\Controllers\CouponController@edit')->name('coupon.edit');
        Route::patch('/edit/{coupon}', 'App\Http\Controllers\CouponController@update')->name('coupon.update');
        Route::get('/show/{coupon}', 'App\Http\Controllers\CouponController@show')->name('coupon.show');
        Route::delete('/delete/{coupon}', 'App\Http\Controllers\CouponController@delete')->name('coupon.delete');
    }
);

Route::prefix('/campaign')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\CampaignController@index')->name('campaign.index');
        Route::post('/store', 'App\Http\Controllers\CampaignController@store')->name('campaign.store');
        Route::get('/create', 'App\Http\Controllers\CampaignController@create')->name('campaign.create');
        Route::get('/edit/{campaign}', 'App\Http\Controllers\CampaignController@edit')->name('campaign.edit');
        Route::patch('/edit/{campaign}', 'App\Http\Controllers\CampaignController@update')->name('campaign.update');
        Route::get('/show/{campaign}', 'App\Http\Controllers\CampaignController@show')->name('campaign.show');
        Route::delete('/delete/{campaign}', 'App\Http\Controllers\CampaignController@delete')->name('campaign.delete');
        Route::post('ajax-get', 'App\Http\Controllers\CampaignController@ajaxGet');
    }
);
Route::prefix('/membershipcampaign')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\MembershipCampaignController@index')->name('membershipcampaign.index');
        Route::post('/store', 'App\Http\Controllers\MembershipCampaignController@store')->name('membershipcampaign.store');
        Route::get('/create', 'App\Http\Controllers\MembershipCampaignController@create')->name('membershipcampaign.create');
        Route::get('/edit/{membershipcampaign}', 'App\Http\Controllers\MembershipCampaignController@edit')->name('membershipcampaign.edit');
        Route::patch('/edit/{membershipcampaign}', 'App\Http\Controllers\MembershipCampaignController@update')->name('membershipcampaign.update');
        Route::get('/show/{membershipcampaign}', 'App\Http\Controllers\MembershipCampaignController@show')->name('membershipcampaign.show');
        Route::delete('/delete/{membershipcampaign}', 'App\Http\Controllers\MembershipCampaignController@delete')->name('membershipcampaign.delete');
        Route::post('ajax-get', 'App\Http\Controllers\CampaignController@ajaxGet');
    }
);

/*----------------------------invoice----------------------------------------*/
Route::prefix('/invoice')->group(
    function () {
        Route::post('/add_payment', 'App\Http\Controllers\InvoiceController@addPayment');
        Route::get('/{id}', 'App\Http\Controllers\InvoiceController@invoiceList');
        Route::post('/edit-payment', 'App\Http\Controllers\InvoiceController@editPayment');
        Route::post('/get-payment_data', 'App\Http\Controllers\InvoiceController@get_payment_data');
        Route::post('/transaction-details-validation', 'App\Http\Controllers\InvoiceController@transaction_details_validation');
        Route::delete('/transaction-comment-delete', 'App\Http\Controllers\InvoiceController@transaction_comments_delete');
        Route::delete('/membership-payment-delete', 'App\Http\Controllers\InvoiceController@membership_payment_delete');
        Route::post('/get-invoice-item-data', 'App\Http\Controllers\InvoiceController@get_invoice_item_data');
        Route::post('/invoice-update', 'App\Http\Controllers\InvoiceController@invoiceUpdate');
        Route::delete('/invoice-items-delete', 'App\Http\Controllers\InvoiceController@invoice_items_delete');
        Route::post('/membership-invoice-update', 'App\Http\Controllers\InvoiceController@membership_invoice_update');
        Route::post('/change-invoice-discount', 'App\Http\Controllers\InvoiceController@change_invoice_discount');

        Route::get('invoice', 'App\Http\Controllers\InvoiceController@invoice');
        Route::get('invoice-edit', 'App\Http\Controllers\InvoiceController@invoiceEdit');

        Route::get('/edit/{invoice_id}', 'App\Http\Controllers\InvoiceController@edit');
        Route::post('/load-invoice-itmes', 'App\Http\Controllers\InvoiceController@load_invoice_itmes');
        Route::post('/save-invoice-itmes', 'App\Http\Controllers\InvoiceController@save_invoice_itmes');
        Route::post('/addons-data-load', 'App\Http\Controllers\InvoiceController@addons_data_load');
    }
);
/*----------------------------/invoice----------------------------------------*/
/*----------------------------Dashboards----------------------------------------*/
Route::prefix('/dashboard')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\DashboardController@index');
    }
);
/*----------------------------/Dashboards----------------------------------------*/


/*----------------------------Membership----------------------------------------*/
Route::prefix('/membership')->group(
    function () {
        // Route::get('/', 'App\Http\Controllers\Membership\MembershipController@index');
        // Route::get('/{id}', 'App\Http\Controllers\Membership\MembershipController@invoiceList');
        Route::post('/edit-payment', 'App\Http\Controllers\Membership\MembershipController@editPayment');
        Route::post('/get-payment_data', 'App\Http\Controllers\Membership\MembershipController@get_payment_data');
        Route::get('/edit/{id}', 'App\Http\Controllers\Membership\MembershipController@edit');
        Route::post('/list', 'App\Http\Controllers\Membership\MembershipController@list');
        Route::get('/list', 'App\Http\Controllers\Membership\MembershipController@list');
        Route::get('/search', 'App\Http\Controllers\Membership\MembershipController@search');
        Route::post('/transaction-list', 'App\Http\Controllers\Membership\MembershipController@transaction_list');
        Route::post('/add-new-organization', 'App\Http\Controllers\Membership\MembershipController@add_new_organization');
        Route::post('/load-user-data', 'App\Http\Controllers\Membership\MembershipController@load_user_data');
    }
);
/*----------------------------/Membership----------------------------------------*/

/*----------------------------Courses----------------------------------------*/
Route::prefix('/course')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\Courses\CoursesController@index');
        //        Route::get('/{id}', 'App\Http\Controllers\Courses\CoursesController@invoiceList');
        Route::post('/edit-payment', 'App\Http\Controllers\MembeCoursesship\CoursesController@editPayment');
        Route::post('/get-payment_data', 'App\Http\Controllers\Courses\CoursesController@get_payment_data');

        Route::post('/store', 'App\Http\Controllers\Courses\CoursesController@store')->name('course.store');
        Route::get('/create', 'App\Http\Controllers\Courses\CoursesController@create')->name('course.create');
        Route::get('/edit/{course}', 'App\Http\Controllers\Courses\CoursesController@edit')->name('course.edit');
        Route::patch('/edit/{course}', 'App\Http\Controllers\Courses\CoursesController@update')->name('course.update');
        Route::get('/show', 'App\Http\Controllers\Courses\CoursesController@show')->name('course.show');
        Route::delete('/delete/{course}', 'App\Http\Controllers\Courses\CoursesController@delete')->name('course.delete');
        Route::post('ajax-get', 'App\Http\Controllers\Courses\CoursesController@ajaxGet');
    }
);

Route::prefix('/coursestatus')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\CourseStatusController@index')->name('coursestatus.index');
        Route::post('/store', 'App\Http\Controllers\CourseStatusController@store')->name('coursestatus.store');
        Route::get('/create', 'App\Http\Controllers\CourseStatusController@create')->name('coursestatus.create');
        Route::get('/edit/{coursestatus}', 'App\Http\Controllers\CourseStatusController@edit')->name('coursestatus.edit');
        Route::patch('/edit/{coursestatus}', 'App\Http\Controllers\CourseStatusController@update')->name('coursestatus.update');
        Route::get('/show/{coursestatus}', 'App\Http\Controllers\CourseStatusController@show')->name('coursestatus.show');
        Route::delete('/delete/{coursestatus}', 'App\Http\Controllers\CourseStatusController@delete')->name('coursestatus.delete');
        Route::post('ajax-get', 'App\Http\Controllers\CourseStatusController@ajaxGet');
    }
);
/*----------------------------/Membership----------------------------------------*/

/*----------------------------Organisation----------------------------------------*/
Route::prefix('/organisations')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\OrganisationController@index');
        Route::post('/', 'App\Http\Controllers\OrganisationController@index');
        Route::post('/store', 'App\Http\Controllers\OrganisationController@store')->name('organisations.store');
        Route::get('/create', 'App\Http\Controllers\OrganisationController@create')->name('organisations.create');
        Route::get('/edit/{coursestatus}', 'App\Http\Controllers\OrganisationController@edit')->name('organisations.edit');
        Route::patch('/edit/{coursestatus}', 'App\Http\Controllers\OrganisationController@update')->name('organisations.update');
        Route::get('/show/{coursestatus}', 'App\Http\Controllers\OrganisationController@show')->name('organisations.show');
        Route::delete('/delete/{coursestatus}', 'App\Http\Controllers\OrganisationController@delete')->name('organisations.delete');
        Route::post('/ajax-data-load', 'App\Http\Controllers\OrganisationController@ajaxDataLoad');
        Route::post('/update', 'App\Http\Controllers\OrganisationController@organisation_update');
        Route::post('/validation', 'App\Http\Controllers\OrganisationController@organisation_validate')->name('organisations.validation');;
    }
);
/*----------------------------/Organisation----------------------------------------*/

/*----------------------------Union Journals----------------------------------------*/
Route::prefix('/journal')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\JournalController@index')->name('journal.index');
        Route::post('/store', 'App\Http\Controllers\JournalController@store')->name('journal.store');
        Route::get('/create', 'App\Http\Controllers\JournalController@create')->name('journal.create');
        Route::get('/edit/{journal}', 'App\Http\Controllers\JournalController@edit')->name('journal.edit');
        Route::patch('/edit/{journal}', 'App\Http\Controllers\JournalController@update')->name('journal.update');
        Route::get('/show/{journal}', 'App\Http\Controllers\JournalController@show')->name('journal.show');
        Route::delete('/delete/{journal}', 'App\Http\Controllers\JournalController@delete')->name('journal.delete');
        Route::post('ajax-get', 'App\Http\Controllers\JournalController@ajaxGet');
    }
);
/*----------------------------/Union Journals----------------------------------------*/

Route::prefix('/view')->group(
    function () {
        Route::get('/', 'App\Http\Controllers\ViewController@index')->name('view.index');
        Route::post('/store', 'App\Http\Controllers\ViewController@store')->name('view.store');
        Route::get('/create', 'App\Http\Controllers\ViewController@create')->name('view.create');
        Route::get('/edit/{view}', 'App\Http\Controllers\ViewController@edit')->name('view.edit');
        Route::patch('/edit/{view}', 'App\Http\Controllers\ViewController@update')->name('view.update');
        Route::get('/show/{view}', 'App\Http\Controllers\ViewController@show')->name('view.show');
        Route::delete('/delete/{view}', 'App\Http\Controllers\ViewController@delete')->name('view.delete');
    }
);
