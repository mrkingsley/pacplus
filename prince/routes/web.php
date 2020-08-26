<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {  
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products','ProductController');
    
    Route::get('/transcation', 'TransactionController@index');
    Route::post('/transcation/addproduct/{id}', 'TransactionController@addProductCart');
    Route::post('/transcation/removeproduct/{id}', 'TransactionController@removeProductCart');
    Route::post('/transcation/clear', 'TransactionController@clear');
    Route::post('/transcation/increasecart/{id}', 'TransactionController@increasecart');
    Route::post('/transcation/decreasecart/{id}', 'TransactionController@decreasecart');
    Route::post('/transcation/bayar','TransactionController@bayar');
    Route::get('/transcation/history','TransactionController@history');
    Route::get('/transcation/laporan/{id}','TransactionController@laporan');
     //User
     Route::resource('user', 'userController');
    // Workshop
    Route::resource('workshop','WorkshopController');


    // Bank
    Route::resource('bank','BankController');

    // Client
    Route::resource('client','ClientController');
    
    // Supplier
    Route::resource('supplier','SupplierController');

     // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');
    
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

   
    //Income Route
    Route::get('/incomes', 'IncomeController@index')->name('incomes.index');
    Route::get('/incomes/create', 'IncomeController@create')->name('incomes.create');
    Route::post('/incomes/store', 'IncomeController@store')->name('incomes.store');
    Route::get('/incomes/edit/{id}', 'IncomeController@edit')->name('incomes.edit');
    Route::post('/incomes/update', 'IncomeController@update')->name('incomes.update');
    Route::get('/incomes/delete/{id}', 'IncomeController@destroy')->name('incomes.delete');

    //Expense Route
    Route::get('/expense', 'ExpenseController@index')->name('expense.index');
    Route::get('/expense/create', 'ExpenseController@create')->name('expense.create');
    Route::post('/expense/store', 'ExpenseController@store')->name('expense.store');
    Route::get('/expense/edit/{id}', 'ExpenseController@edit')->name('expenses.edit');
    Route::post('/expense/update', 'ExpenseController@update')->name('expenses.update');
    Route::get('/expense/delete/{id}', 'ExpenseController@destroy')->name('expenses.delete');

    // Expense/Income summaries
    Route::get('expense/summaries', 'ExpenseController@summary')->name('expenses.summary');

    
    Route::group(['prefix' => 'banks'], function() {
        Route::get('/', ['as' => 'all_banks', 'uses' => 'BankController@index']);
        Route::get('all/data', ['as' => 'all_banks_data', 'uses' => 'BankController@indexData']);
        Route::get('create', ['as' => 'create_banks', 'uses' => 'BankController@create']);
        Route::post('create', 'BankController@store');
        Route::get('{id}/edit', ['as' => 'edit_bank', 'uses' => 'BankController@edit']);
        Route::post('{id}/edit', 'BankController@update');
        Route::post('delete', ['as' => 'delete_banks', 'uses' => 'BankController@destroy']);
    });

    Route::group(['prefix' => 'repair-product'], function() {
        Route::get('/', ['as' => 'all_repair_product', 'uses' => 'RepairProductController@index']);
        Route::get('repair-product-data', ['as' => 'repair_product_data', 'uses' => 'RepairProductController@repairInvoiceData']);

        Route::get('completed', ['as' => 'completed_repair_product', 'uses' => 'RepairProductController@completedRepairProduct']);
        Route::get('completed-repair-product-data', ['as' => 'completed_repair_product_data', 'uses' => 'RepairProductController@completedRepairInvoiceData']);

        Route::get('{id}/view-invoice', ['as' => 'view_repair_invoice', 'uses' => 'RepairProductController@show']);
        Route::get('{id}/view-invoice/print', ['as' => 'print_repair_invoice', 'uses' => 'RepairProductController@invoicePrint']);
        Route::get('{id}/view-invoice/pdf', ['as' => 'pdf_repair_invoice', 'uses' => 'RepairProductController@invoicePDF']);
        Route::get('create', ['as' => 'new_repair_product', 'uses' => 'RepairProductController@create']);
        Route::post('create', 'RepairProductController@store');
        Route::post('change-invoice-status', ['as' => 'change_repair_invoice_status', 'uses' => 'RepairProductController@changeRepairInvoiceStatus']);
        Route::post('save-engineer-note-in-item', ['as' => 'save_engineer_note_in_item', 'uses' => 'RepairProductController@saveEngineerNoteInItem']);
    });


});




