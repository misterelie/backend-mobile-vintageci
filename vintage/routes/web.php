<?php

use App\Http\Controllers\Front\AnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Seller\DashboardController;

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
//* Accueil
Route::get('/', [HomeController::class, 'index'] )->name("home");

//* Contact:
Route::get('/contactez-nous', [HomeController::class, 'contact'] )->name("contact");


//* FAQ:
Route::get('/faq', [HomeController::class, 'faq'] )->name("faq");

//* FAQ:
Route::get('/conditions', [HomeController::class, 'conditions'] )->name("conditions");

//* Annonces completes:
Route::get('/annonces', [AnnonceController::class, 'index'] )->name("annonces");


//*===========================================================================**/
//*=========================== PROFIL CLIENT ================================**/
//*==========================================================================**/

//* Page de profil général:
Route::get('/mon-compte', [DashboardController::class, 'index'] )->name("mon-compte");

//* Inscription & Connexion client
Route::get('/inscription', [DashboardController::class, 'register'] )->name("inscription");

//* Connexion:
Route::get('/connexion', [DashboardController::class, 'login'] )->name("connexion");