<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function() {

   return ('<h1>Daftar Kontak</h1>');

})->name('contacts.index');

Route::get('/contacts/create', function() {

   return ('<h1>Tambah Kontak Baru</h1>');

})->name('contacts.create');
Route::get('/contacts/{id}', function($id) {

   return 'Ini Kontak ke-' . $id;

})->whereNumber('id')->name('contacts.show');

Route::get('/', function () {

   $html = "
   <h1>Contact App</h1>
   <div>
       <a href='” . route('contacts.index') . “‘>All contacts</>
       <a href='” . route('contacts.create') . “‘>Add contacts</>
       <a href='” . route('contacts.show', 1) . “‘>Show contacts</>
       </div>
    
       ";
    
       return $html;
    
       // return view(‘welcome’);
    
    });

Route::get('/companies/{name?}', function($name=null) {

   if($name) {

       return 'Nama Perusahaan:' . ($name);

   } else {

       return 'Nama Perusahaan Kosong';

   }
})->whereAlphaNumeric('name');

Route::get('/', function () {

   $html = "
   <h1>Contact App</h1>
   <div>
       <a href='/contacts'>All contacts</>
       <a href='/contacts/create'>Add contacts</>
      <a href='/contacts/1'>Show contacts</a>
   </div>
   ";

   return $html;

   // return view(‘welcome’);

});