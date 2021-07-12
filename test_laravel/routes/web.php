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

//route standard laravel
/*Route::get('/', function () {
    return view('welcome');
});*/


//route get login visualizza la view login
Route::get('/login', function () {

    return view('login')->with('csrf_token',csrf_token())->with("message","");
});

//route post login esegue la query e se tutto ok ci reindirizza alla homepage
Route::post('/login', function () {

    $user = User::where('username',request('id'))->where('password',request('password'))->first();
    if(isset($user)){
        Session::put("username",$user->username);
        return redirect('home');
    }
    else {
        return view('login')->with('csrf_token',csrf_token())->with('message',"Credenziali errate");
    }
        
});



//rout get home visualizza la view home
Route::get('/home','App\Http\Controllers\HomeController@home');
Route::get('/home/importContenuti','App\Http\Controllers\HomeController@contenutiHome');
Route::post('/checkPreferiti','App\Http\Controllers\HomeController@checkPreferiti');
Route::post('/addPreferiti','App\Http\Controllers\HomeController@addPreferiti');
Route::post('/removePreferiti','App\Http\Controllers\HomeController@removePreferiti');
Route::post('/search','App\Http\Controllers\HomeController@search');


//route get registrazione visualizza la view registrazione
Route::get('/registrazione', function () {
    return view('registrazione')->with('csrf_token',csrf_token())->with('message','');
});



Route::post('/insertUtente', 'App\Http\Controllers\RegisterController@register');


Route::get('/logout.php', function () {

    return redirect('login');
});


Route::get('/preferiti','App\Http\Controllers\PreferitiController@preferiti');
Route::get('/favourite','App\Http\Controllers\PreferitiController@preferiti');


Route::get('/service','App\Http\Controllers\ServiziController@getAllServiziUsingModel');

Route::get('/servizi', function () {

    return view('servizi');
});


Route::get('/prenotazioni','App\Http\Controllers\PrenotazioniController@prenotazioni');
Route::post('/checkPrenotazioni','App\Http\Controllers\PrenotazioniController@checkPrenotazioni');
Route::post('/addPrenotazione','App\Http\Controllers\PrenotazioniController@addPrenotazione');
Route::post('/removePrenotazione','App\Http\Controllers\PrenotazioniController@removePrenotazione');

