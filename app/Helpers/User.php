<?php
namespace App\Helpers;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class User extends Helpers
{

   protected static  $userType;
   protected static  $user;
   protected static  $userEmail;
   protected static  $userID;
   protected static $activeSession = false;
   protected static $withCookie = false;

    /**
     * Helper pour travailler sur les utilisateurs 'connecté, les visiteurs, etc.
     * Il étend du Helper principal
     */

     /**
      * Récupérer l'utilisateur qui est connecté
      *
      * @return mixed $user
      */
     public static function user()
     {
        $user = UserModel::where("id", self::getConnectedKey())->first();
        return ($user) ? $user : null;
     }

     public static function userId()
     {
      return self::getConnectedKey();
     }
     /**
      * Retourne le type de l'utilisateur:
      */
     public static function getUserType(): int
     {
         self::$userType = null;
         if(!Session::has('user_type') && Cookie::has('user_type')){
           self::$userType = Cookie::get('user_type');
         }

         if(Session::has('user_type')){
           self::$userType = Session::get('user_type');
         }
         
         return (int) self::$userType;
     }

     /**
      * Retourne la clé ID de l'utilisateur;
      */
     public static function getConnectedKey(): int
     {
         if(!Session::has('user_id') && Cookie::has('user_id')){
           self::$userID = Cookie::get('user_id');
         }

         if(Session::has('user_id')){
           self::$userID = Session::get('user_id');
         }
         
         return (int) self::$userID;
     }


     /**
      * Savoir sir l'utilisateur a une session en cours
      * [Session, Cookie]
      */
     public static function activeSession()
     {
         if(!Session::has('user_id') && Cookie::has('user_id')){
            self::$activeSession = true;
         }

         if(Session::has('user_id')){
            self::$activeSession = true;
         }
         
         return self::$activeSession;
     }

     /**
      * Savoir avec quel Session, l'utilisateur est connecté
      */
     public static function withCookie() :bool
     {
         if(Cookie::has('user_id')){
            self::$withCookie = true;
         }
         return self::$withCookie;
     }


     public static function notifications()
     {
       return  self::user()->notifications()->where(['deleted' => 0])->latest()->limit(12)->get();
     }  
     public static function countNotifiy()
     {
      return  self::user()->notifications()->where(['deleted'=> 0, 'open' => 0])->latest()->count();
     }

     public static function hasNotifications()
     {
      return  self::user()->notifications()->where(['deleted'=> 0])->latest()->count();
     }

     public static function addSolde($user)
     {
      $user = UserModel::where('id',$user)->first();
      $solde = !is_null($user->solde) ? $user->solde->montant : 0;
      return !is_null($solde) ? $solde : 0;
     }

     public static function solde()
     {
      $user = self::user();
      return  !is_null($user->solde) ? $user->solde->montant : 0;
     }

     /**
      * Débiter le solde du client
      *
      * @param integer $montantDebit
      * @return bool
      */
     public static  function debiterSolde(int $montantDebit){
        $array = ['montant' => self::solde() - $montantDebit];
        if(self::user()->solde()->update($array)){
          return true;
        }else{
          return false;
        }
     }
}