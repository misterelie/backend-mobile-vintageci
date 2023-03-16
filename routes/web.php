<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\MarqueController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\Admin\AdresseController;
use App\Http\Controllers\Admin\CommuneController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MentionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\AnnonceController;
use App\Http\Controllers\User\CheckOutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OffreVipController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\PageTitleController;
use App\Http\Controllers\User\SellerAuthController;
use App\Http\Controllers\User\UserAnnonceController;
use App\Http\Controllers\Admin\BackendUserController;
use App\Http\Controllers\Admin\OffreCreditController;
use App\Http\Controllers\User\UserPurchaseController;
use App\Http\Controllers\Admin\AdminAnnonceController;
use App\Http\Controllers\Admin\SousCategoryController;
use App\Http\Controllers\Admin\BackendPurchaseControler;
use App\Http\Controllers\Services\NotificationController;
use App\Http\Controllers\User\UserNotificationController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HelpController;

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
Route::get('/', [HomeController::class, 'index'] )->name("interface.index");


//* Toutes les categories:
Route::get('/annonces/categories', [HomeController::class, 'categoryGroup'] )->name("all-category-product");

//* Toutes les Annonces par Communes:
Route::get('/annonces/communes', [HomeController::class, 'communesGroup'] )->name("interface.commune");


//* Contact:
Route::get('/interface.contact', [HomeController::class, 'contact'] )->name("interface.contact");


//* FAQ:
Route::get('/faq', [HomeController::class, 'faq'] )->name("faq");

//* Aides :
Route::get('/help', [HomeController::class, 'Aide'] )->name("interface.mediatheque_aide");

//* CGU:
Route::get('/cgu', [HomeController::class, 'cgu'] )->name("cgu");

//* Propriété intellectuelle:
Route::get('/propriete-intellectuelle', [HomeController::class, 'propriete'] )
->name("propriete-intellectuelle");


//* FAQ:
Route::get('/conditions', [HomeController::class, 'conditions'] )->name("conditions");


//* Credits de Boosts:
Route::get('/credits', [HomeController::class, 'pricings'] )->name("interface.buy_credit");


/**
 * GESTION DES MESSAGES
 * 
 * 
 */

 //* Gestion des communes:
 Route::get('/contacts', [ContactController::class, "index"])->name('interface.contact');
 Route::post('/contact/store', [ContactController::class, "store"])->name('contact.store');
 Route::get('/contact/destroy/{contact}', [ContactController::class, "destroy"])->name('contact.destroy');

/*
|--------------------------------------------------------------------------
| Les annonces
|--------------------------------------------------------------------------
|
*/
//* Annonces completes:
Route::get('/annonces', [AnnonceController::class, 'index'] )->name("annonce-product");
Route::get('/annonces/pro/{boost}', [AnnonceController::class, 'boosted'] )->name("interface.annonce_vip");
//* Annonces completes:
Route::get('/search', [AnnonceController::class, 'search'] )->name("search");




/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
|
*/


//*====================== ANNONCES DE L'UTILISATEUR:

Route::middleware(["user_auth"])->group(function(){
    //* Page de profil général:
    Route::get('/mon-compte', [DashboardController::class, 'index'] )->name("mon-compte");
    //* Supprimer le compte de l'utilisateur:
    Route::get('/account/drop', [SettingController::class, 'dropAccount'] )->name("account.drop");
    //* Annonces du client:
    Route::get('/account/mes-annonces', [DashboardController::class, 'annonces'] )->name("account.mes-annonces");
    //* Publier une annonce:
    Route::get('/annonces/new', [UserAnnonceController::class, 'create'] )->name("interface.pub_annonce");
    Route::post('/annonces/store', [UserAnnonceController::class, 'store'] )->name("annonces.store");
    Route::post('/annonces/storeImage', [UserAnnonceController::class, 'storeImage'] )->name("annonces.storeImage");
    Route::post('/annonces/removeImage', [UserAnnonceController::class, 'removeImage'] )->name("annonces.removeImage");




    //* Profil Setting:
    Route::get('/account/setting', [DashboardController::class, 'profil'] )->name("account.setting");


    //* Page CheckOut DE Crédit:
    Route::get('/purchase/credit', [CheckOutController::class, 'purchaseCredit'] )->name("purchase.credit");


    //* Valider l'achat de Crédits:
    Route::post('/purchase/store', [CheckOutController::class, 'storeCreditPurchase'] )->name("purchase.store");

    //* Page d'alerte des opérations:
    Route::get('/poste/notification', [UserNotificationController::class, 'afterPoste'] )->name("poste.notification");

    Route::get('/annonces/edit/{pk}', [UserAnnonceController::class, 'edit'] )->name("annonces.edit");

    Route::post('/annonces/promo/{annonce}', [UserAnnonceController::class, 'pricePromo'] )->name("annonces.promo");


    Route::post('/annonces/update/{annonce}', [UserAnnonceController::class, 'update'] )->name("annonces.edit");

    Route::get('/annonces/delete/{pk}', [UserAnnonceController::class, 'delete'] )->name("annonces.edit");

    Route::get('/annonces/toggle/{annonce}', [UserAnnonceController::class, 'toggle'] )->name("annonces.toggle");

    Route::post('/annonces/destroy/{annonce}', [UserAnnonceController::class, 'destroy'] )->name("annonces.edit");

    //* Modifier le profil Utilisateur:
    Route::post('/setting/save/{user}', [DashboardController::class, 'setting'] )->name("setting.save");

    //* Modifier le mot de passe:
    Route::post('/resetPassword/{user}', [DashboardController::class, 'resetPassword'])->name('resetPassword');

    Route::post('/account/remove/{user}', [SettingController::class, 'remove'] )->name("remove.account");



    //* GESTION DES NOTIFICATION DE L4uTILISATEUR:
    Route::get('/toggle-notification', [NotificationController::class, 'toggle'])->name('toggle-notification');

    Route::get('/remove-notification', [NotificationController::class, 'remove'])->name('remove-notification');

    //* Gestion des Achats de L'utilisateur:
    Route::get('/account/my-purchases', [UserPurchaseController::class, 'index'] )->name("account.my-purchases");

    Route::get('my-purchase/destroy/{purchase}', [BackendPurchaseControler::class, "destroy"])->name('destroy.my-purchase');

    //*======================== Création D'annonce VIP: ===================*//
    //* Checkout Page 1
    Route::get('annonce/vip/{pk?}', [CheckOutController::class, "checkOut"])->name('checkout.annonce');
    
    //* Payement de l'oofre VIP:
    Route::post('payement/vip', [CheckOutController::class, "payementVip"])->name('payement.vip');

});






//* Alerte:
Route::get('/register/notification', [UserNotificationController::class, 'afterRegister'] )->name("register.notification");

Route::get('/password/notification', [UserNotificationController::class, 'passwordReset'] )->name("password.notification");

//* Alerte:
Route::get('/confirmation/notification', [UserNotificationController::class, 'afterValidation'] )->name("confirmation.notification");

//* Alert:
Route::get('/timeout/notification', [UserNotificationController::class, 'timeout'] )->name("timeout.notification");

//* Inscription & Connexion client
Route::get('/interface.register', [SellerAuthController::class, 'register'] )->middleware(['already_auth'])->name("interface.register");

//* Connexion:
Route::get('/connexion', [SellerAuthController::class, 'login'] )->name("interface.login")->middleware(['already_auth']);

//* Déconnexion:f
Route::get('/deconnexion', [LoginController::class, 'logout'] )->name("deconnexion");

//* Demande réinitialisation de compte:
Route::get('/reset_password', [SellerAuthController::class, 'forgot'] )->name("interface.reset_password");
Route::post('/forgot/check', [SellerAuthController::class, 'forgotCheck'] )->name("forgot.check");
Route::get('/reset-account/{token}', [SellerAuthController::class, 'reset'] )->name("reset-account");

Route::post('/reset/{user}', [SellerAuthController::class, 'reinitialiser'] )->name("reset");







/*
|--------------------------------------------------------------------------
| Admins Managing Panel
|--------------------------------------------------------------------------
|
*/

//*===========================================================================**/
//*=========================== ADMINISTRATION ================================**/
//*===========================================================================**/

Route::middleware(["backend_auth", "backend_exist_user"])->group(function(){
    Route::get('/back-office', [AdminDashboardController::class, 'index'] )->name("back-office");
    
    //* Gestion des Catégories d'actualités
    Route::get('/backend/categories', [CategoryController::class, "index"])->name('backend.categories');
    Route::post('/category/store', [CategoryController::class, "store"])->name('category.store');
    Route::post('/category/update/{category}', [CategoryController::class, "update"])->name('category.update');
    Route::get('/category/destroy/{category}', [CategoryController::class, "destroy"])->name('category.destroy');

    //* Gestion des SousCatégories:
    Route::get('/souscategories', [SousCategoryController::class, "index"])->name('souscategories');
    Route::post('/souscategory/store', [SousCategoryController::class, "store"])->name('souscategory.store');
    Route::post('/souscategory/update/{souscategory}', [SousCategoryController::class, "update"])->name('souscategory.update');
    Route::get('/souscategory/destroy/{souscategory}', [SousCategoryController::class, "destroy"])->name('souscategory.destroy');

    //* Gestion des communes:
    Route::get('/communes', [CommuneController::class, "index"])->name('communes');
    Route::post('/commune/store', [CommuneController::class, "store"])->name('commune.store');
    Route::post('/commune/update/{commune}', [CommuneController::class, "update"])->name('commune.update');
    Route::get('/commune/destroy/{commune}', [CommuneController::class, "destroy"])->name('commune.destroy');

    //* Gestion des Marques:
    Route::get('/marques', [MarqueController::class, "index"])->name('marques');
    Route::post('/marque/store', [MarqueController::class, "store"])->name('marque.store');
    Route::post('/marque/update/{marque}', [MarqueController::class, "update"])->name('marque.update');
    Route::get('/marque/destroy/{marque}', [MarqueController::class, "destroy"])->name('marque.destroy');



    //* Gestion des Annonces:
    Route::get('/backend/annonces', [AdminAnnonceController::class, "index"])->name('backend.annonces');
    Route::get('/backend/online-annonces', [AdminAnnonceController::class, "annonces"])->name('backend.online-annonces');
    Route::get('/backend/rejected-annonces', [AdminAnnonceController::class, "rejetes"])->name('backend.rejected-annonces');
    Route::get('/backend/removeds', [AdminAnnonceController::class, "retires"])->name('backend.removeds');

    Route::get('/backend/single/{annonce}', [AdminAnnonceController::class, "single"])->name('backend.single');

    Route::post('/backend/decision/{annonce}', [AdminAnnonceController::class, "decision"])->name('backend.single');

    Route::get('/annonce/destroy/{annonce}', [AdminAnnonceController::class, "destroy"])->name('annonce.destroy');


    //* Gestion des Utilisateurs:
    Route::get('/backend/users', [BackendUserController::class, "index"])->name('users.liste');

    Route::get('/backend/admins', [BackendUserController::class, "editeurs"])->name('users.admins');

    Route::get('/backend/user-single/{user}', [BackendUserController::class, "show"])->name('backend.user-single');

    Route::post('/user/store', [BackendUserController::class, "store"])->name('user.store');

    Route::post('/user/update/{user}', [BackendUserController::class, "update"])->name('user.update');

    Route::get('/user/destroy/{user}', [BackendUserController::class, "destroy"])->name('user.destroy');

    
    //* Gestion des FAQ
    Route::get('/questions', [AdminQuestionController::class, "index"])->name('questions');

    Route::post('/question/store', [AdminQuestionController::class, "store"])->name('question.store');

    Route::post('/question/update/{question}', [AdminQuestionController::class, "update"])->name('question.update');

    Route::get('/question/destroy/{question}', [AdminQuestionController::class, "destroy"])->name('question.destroy');



    //*Mise à jour des mentions légales
    Route::get('/mentions', [MentionController::class, "index"])->name('mentions');
    Route::post('/mention/store', [MentionController::class, "store"])->name('mention.update');

    Route::get('/cgus', [MentionController::class, "cgu"])->name('cgus');
    Route::post('/cgu/store', [MentionController::class, "updateCgu"])->name('cgu.update');


    Route::get('/pi', [MentionController::class, "pi"])->name('pi');
    Route::post('/pi/store', [MentionController::class, "updatePi"])->name('cgu.update');

    //*- Gestion des contacts:
    Route::get('/adresses', [AdresseController::class, "index"])->name('adresses');
    Route::post('/adresse/store', [AdresseController::class, "store"])->name('adresse.update');

    //* Gestion des titres de pages:
    Route::get('/pages', [PageTitleController::class, "index"])->name('pages');
    Route::post('/page/store', [PageTitleController::class, "store"])->name('adresse.update');


    //* Gestions des Offres de Crédits:
    Route::get('credits/manage', [OffreCreditController::class, "index"])->name('credits.manage');
    Route::post('/credit/store', [OffreCreditController::class, "store"])->name('credit.store');
    Route::post('/credit/update/{credit}', [OffreCreditController::class, "update"])->name('credit.update');
    Route::get('/credit/destroy/{credit}', [OffreCreditController::class, "destroy"])->name('credit.destroy');

    //* Gestion des Achats de Crédits:
    Route::get('credits/purchases', [BackendPurchaseControler::class, "index"])->name('credits.purchases');

    Route::get('purchase/confirm/{purchase}', [BackendPurchaseControler::class, "confirm"])->name('confirm.purchase');

    Route::get('purchase/cancel/{purchase}', [BackendPurchaseControler::class, "cancel"])->name('cancel.purchase');

    Route::get('purchase/destroy/{purchase}', [BackendPurchaseControler::class, "destroy"])->name('destroy.purchase');



    //* Gestion des Offres VIP:
    Route::get('vips/manage', [OffreVipController::class, "index"])->name('vips.manage');
    Route::post('/vip/store', [OffreVipController::class, "store"])->name('vip.store');
    Route::post('/vip/update/{vip}', [OffreVipController::class, "update"])->name('vip.update');
    Route::get('/vip/destroy/{vip}', [OffreVipController::class, "destroy"])->name('vip.destroy');

    //* Afficher les Annonces VIP:
    Route::get('boosted/annonces', [BackendPurchaseControler::class, "boostedAnnonces"])->name('boosted.annonces');
    //* Liste des achats VIP Boosts:
    Route::get('vips/purchases', [BackendPurchaseControler::class, "vipPurchases"])->name('vips.purchases');
    //* Suppr achat VIP
    Route::get('/viplist/remove/{purchase}', [BackendPurchaseControler::class, "removePurchaseVip"])->name('vip.destroy');


    //* GESTION DES AIDES :
    Route::get('helps/manage', [HelpController::class, "index"])->name('helps.manage');
    Route::post('/help/store', [HelpController::class, "store"])->name('help.store');
    Route::post('/help/update/{help}', [HelpController::class, "update"])->name('help.update');
    Route::get('/help/destroy/{help}', [HelpController::class, "destroy"])->name('help.destroy');


});





//* Détails de l'annonce:
Route::get('/annonces/single/{pk}', [AnnonceController::class, 'single'] )->name("annonces/categories");

//* Annonces completes:
Route::get('/interface.annonce_category/{category}/{id}', [AnnonceController::class, 'group'] )->name("interface.annonce_category");
Route::get('/interface.commune_annonce/{commune}/{id}', [AnnonceController::class, 'communesGroup'] )->name("interface.commune_annonce");



//*===========================================================================**/
//*=========================== ADMIN AUTHENTIFICATION ========================**/
//*===========================================================================**/




//* Inscription de l'Administrateur:
Route::get('/backend/register', [RegisterController::class, 'index'] )->name("backend.register");

//* Inscription Utilisateur
Route::get('/inscription', [RegisterController::class, 'inscription'] )->name("inscription");


Route::post('/post/register', [RegisterController::class, 'register'] )->name("post.register");



//* URL pour activer un compte utilisateur
Route::get('/account/validate/{token}', [RegisterController::class, 'setAccount'] )->name("account.validate");

//*
Route::post('/save/user', [RegisterController::class, 'save'] )->name("save.user");

Route::get('/clear-config', function () {
    Artisan::call('config:clear');
});

//* Connexion de lo'Administrateur:
Route::get('/backend/login', [LoginController::class, 'index'] )->name("backend.login")->middleware(["backend_exist_user"])->middleware(['already_auth']);
Route::post('/post/auth', [LoginController::class, 'auth'] )->name("post.auth");



Route::get('/link', function () {
    Artisan::call('storage:link');
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
});

//* Vendeur HUAWEI P10=> 50k : 0789874089
//* Vendeur Samsung S8 => 65K: 0142246557 ouatara angré
//* MP: 9876543210ok


//* ranger les offres en ordre numerique.
//* Publer un guide d'utilisation
//* Contacter le vendeur par chatBot
//* Ajuter tus les cntact de ALLO SERVICE
//* Télécharger la vue de la page checkout Crédit
//* Nommer le bouton Booster <=> Sponsoriser
//* Chnager la couleur d'arrière plan des moyens de payement

//* Compresser les images
//* Gérer le profil de l'admin connecté