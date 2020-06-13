<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('companies','CompanyController');

Route::resource('employees','EmployeeController');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from Codersea Laravel Project',
        'body' => 'New Company Added'
    ];
   
    \Mail::to('muhamad.atout@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});
