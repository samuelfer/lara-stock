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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard', 'DashboardController');

Route::resource('fornecedor', 'FornecedorController');

Route::resource('produto', 'ProdutoController');

Route::resource('setor', 'SetorController');

Route::resource('entrada', 'EntradaController');

Route::resource('saida', 'SaidaController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');



Route::get('/', 'PostController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('posts', 'PostController');

