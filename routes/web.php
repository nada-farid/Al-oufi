<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
   
    //invoices
Route::get('invoice/printing/{id}','QrCodeController@index')->name('invoices.print');

Route::get('/qr_details/{id}', 'QrCodeController@details')->name('qr_details');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/parse-csv-import', 'ClientsController@parseCsvImport')->name('clients.parseCsvImport');
    Route::post('clients/process-csv-import', 'ClientsController@processCsvImport')->name('clients.processCsvImport');
    Route::resource('clients', 'ClientsController');

    // Notification
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::post('notifications/media', 'NotificationController@storeMedia')->name('notifications.storeMedia');
    Route::post('notifications/ckmedia', 'NotificationController@storeCKEditorImages')->name('notifications.storeCKEditorImages');
    Route::resource('notifications', 'NotificationController');
    Route::get('notification/reports','NotificationController@report')->name('notifications.report');
      Route::Post('notification/Apperance','NotificationController@changApparance')->name('notifications.changApparance');
    

    // Awb
    Route::delete('awbs/destroy', 'AwbController@massDestroy')->name('awbs.massDestroy');
    Route::post('awbs/media', 'AwbController@storeMedia')->name('awbs.storeMedia');
    Route::post('awbs/ckmedia', 'AwbController@storeCKEditorImages')->name('awbs.storeCKEditorImages');
    Route::resource('awbs', 'AwbController');
    Route::get('awb_check', 'AwbController@check_awb')->name('awb.check');
    Route::get('awb_date', 'AwbController@get_date')->name('awb.get_date');
    
    

    // Client Fees
    Route::delete('client-fees/destroy', 'ClientFeesController@massDestroy')->name('client-fees.massDestroy');
    Route::resource('client-fees', 'ClientFeesController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');
    Route::get('reports','ReportController@index')->name('invoices.reports');
    Route::get('reportsByDate','ReportController@report')->name('invoice.reportsByDate');
    Route::get('reportsByClient','ReportController@report')->name('invoice.reportsByClient');
    Route::Post('status','InvoicesController@status')->name('invoices.changeStatus');
    Route::get('returendInvoices','InvoicesController@returend')->name('invoices.returned');
    
    
    

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['namespace' => 'Admin'],function () {
Route::get('/qr_details/{id}', 'QrCodeController@details')->name('qr_details');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

