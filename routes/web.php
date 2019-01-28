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
use App\airport;
use App\airline;
use App\country;



Route::get('/', function(){
  $config = array();
  $config['center'] = '50.110924, 8.682127';
  $config['zoom'] = '6';
  $config['map_height'] = '400px';

  $map = GMaps::create_map();

    $airport = airport::all();
    $country = country::all();
  return view('airports.index', ['map'=>$map, 'country'=> $country, 'airports'=>$airport]);
});



Route::delete('/airports/{id}', 'airportController@destroy')->name('airports.destroy');
Route::delete('/airlines/{id}', 'airlineController@destroy')->name('airlines.destroy');

Route::resource('/airlines', 'airlineController');

Route::resource('/airports', 'airportController');
