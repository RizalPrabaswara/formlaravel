<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DistrictDropdownController;
use App\Http\Controllers\KotaDropdownController;
use App\Models\User;
use Database\Factories\DistrictFactory;
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

Route::get('/attach-detach', function () {
    $user = User::find(1);
    $user->skills()->attach([2,4,6,7,8,10,13,17]);
    return 'Attached Berhasil';
});

// Route::get('/dashboard', function(){
//     return view('dashboard.users.index');
// });

Route::resource('/dashboard/users', DashboardPostController::class);

Route::get('kota-dropdown', KotaDropdownController::class)->name('kota.dropdown');
Route::get('district-dropdown', DistrictDropdownController::class)->name('district.dropdown');

// Route::post('/state', [DashboardPostController::class, 'city']);
// Route::post('/district', [DashboardPostController::class, 'district']);

// Route::get('getCities/{id}', function ($id){
//     $cities = \DB::table('cities')->where('id_country',$id)->get();
//     return response()->json($cities);
// });

// Route::resource('/dashboard/users', DashboardPostController::class)->group(function () {
//     Route::post("categories", "getSkill")->name('get-skill');
// });
