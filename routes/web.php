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

Route::redirect('/', '/dashboard');

Auth::routes();
Route::redirect('/home', '/dashboard');
//
// Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
// Route::get('settings', 'Dashboard\DashboardController@settings')->name('settings');

// Route::resource('donors', 'Donor\DonorController');


Route::get('donors/{donor}/donations', 'Donor\DonorController@donations')->name('donations');

Route::get('donors/{donor}/donation-form', 'Donor\DonorController@donationForm')->name('donation-form');

Route::post('donors/{donor}/donate', 'Donor\DonorController@donate')->name('donate');

Route::post('donors/{donor}/addfamily', 'Donor\DonorController@addfamily')->name('donors.addfamily');

Route::get('donors/{printdetails}/tcpdf', 'TCPDFController@index')->name('tcpdf.index');
Route::get('donor/tcpdf', 'TCPDFController@printall')->name('tcpdf.printall');



Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

Route::namespace('Donor')->group(function(){
  Route::prefix('donors')->group(function(){
   Route::name('donors.')->group(function(){

      Route::get('create', 'DonorController@index')->name('create');
      Route::post('store', 'DonorController@store')->name('store');
      Route::get('view-all', 'DonorController@viewAll')->name('view');
      Route::post('import', 'DonorController@import')->name('import');
      Route::get('{donor}/all-details', 'DonorController@donarDetails')->name('donardetails');
      Route::post('{donor}/donation-amount', 'DonorController@donationAmt')->name('donationAmt');
      Route::get('{donor}/actions', 'DonorController@otherAction')->name('otheraction');

      Route::post('search/', 'DonorController@searchable')->name('searchable');


    });

  });
});

Route::get('settings', 'Dashboard\DashboardController@settings')->name('settings');
