<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\User;
use Illuminate\Support\Facades\DB;
use App\Models\Annonce;
use App\Models\AnnonceVip;
use App\Models\Visite;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Stat extends Helpers{

    /**
     *-   
     *-  Statistiques des Utilisateurs:
     *-   
     */


     /**
      * Pour caluler le total des annonces:
      */
     public static function countAnnonce($user = null)
     {
      if(is_null($user)){
         $user = User::user()->id;
      }
        $count = DB::table("annonces")->where(["user_id" => $user])->count();
        return $count;
     }

     public static function countPausedAnnonce($user = null)
     {
      if(is_null($user)){
         $user = User::user()->id;
      }
        $count = DB::table("annonces")->where(["user_id" => $user, "statut" => 0])->count();
        return $count;
     }

     public static function countOnlineAnnonce($user = null)
     {
      if(is_null($user)){
         $user = User::user()->id;
      }
        $count = DB::table("annonces")->where(["user_id" => $user, "statut" => 1])->count();
        return $count;
     }

     public static function countRejectedAnnonce($user = null)
     {
         if(is_null($user)){
            $user = User::user()->id;
         }
        $count = DB::table("annonces")->where(["user_id" => $user, "statut" => 2])->count();
        return $count;
     }


     /**
      * Incrementer les Nombre de vue d'une annonce
      */
     public static function incrementView(Annonce $annonce)
     {
        if(is_null(User::user()) || $annonce->user_id != User::user()->id){ 
         // Si le visiteur n'est l'auteur du poste
         $array = ["vue" => $annonce->vue + 1];
         return $annonce->update($array);
        }
     }


      public static function getRows($Table, $field = null, $statut = null){

         if(!is_null($field) && !is_null($statut)){
            $count = DB::table($Table)->where([$field => $statut])->count();
         }
         else{
            $count = DB::table($Table)->count();
         }
         return $count;
      }   
   





      /**
       * Calcule la date de fin à partir de la date de debut
       * + La durée total
       *
       * @param Carbon $startDate
       * @param Carbon $duree
       * @return \Carbon\Carbon
       */
      public static function dayDiff($startDate, $duree){
         $currentDateTime = Carbon::createFromFormat("Y-m-d H:i:s", $startDate);
         $newDateTime = $currentDateTime->addDays($duree);
         return $newDateTime;
      }


      public static function compare()
      {
         $date_1 =  Carbon::createFromFormat("Y-m-d H:i:s", "2022-10-31 15:21:00");
         $date_2 =  Carbon::createFromFormat("Y-m-d H:i:s", "2022-11-05 15:21:00");

         if($date_1 > $date_2){
            return true;
         }else{
            return false;
         }
      }
      /**
       *Calcule la date de fin d'une campagne VIP
       *
       * @param Annonce $annonce
       * @return mixed
       */
      public static function AnnonceDelay(Annonce $annonce)
      {
         if(!is_null($annonce) && !is_null($annonce->vip)){
            $delay =  self::dayDiff($annonce->vip->date, $annonce->vip->duree);
         }else{
            $delay = null;
         }
         return $delay;
      }


      public static function delay(Object $annonce)
      {
         if(!is_null($annonce)){
            $delay =  self::dayDiff($annonce->date, $annonce->duree);
         }else{
            $delay = null;
         }
         return $delay;
      }


      public static function vipAnnoncesFilter(){
         $vips = AnnonceVip::all();
         if(!is_null($vips)){
            foreach ($vips as $v) {
               if(Carbon::now() > self::delay($v)){ //Carbon::now() > self::delay($v)
                  $v->update(["deleted" => 1, "statut" => 3]);
                  $v->delete();
                  // return dd($v);
               }
            }
         }
         return true;
      }

      public static function now()
      {
         return Carbon::now();
      }


      public static function visites():int{
         $visites = Visite::all();
         return (!is_null($visites)) ? $visites->count() : 0;
      }

      public static function visitesByDevice($device = "Ordinateur"){
         $visites = Visite::select([DB::raw("count('user_ip') as total")])
                     ->where("device" , $device)
                     ->first();
         return (!is_null($visites)) ? $visites->total : 0;
      }


      public static  function annnoncesAttente(){
         $rows = Annonce::
         select(["*",DB::raw("count('id') as count")])
         ->where(["deleted" => 0])
         ->groupBy("statut")
         ->latest()
         ->get();
         return $rows;
      }

      public static  function courbeAnnonces(){
         $rows = Annonce::
         select(["*",DB::raw("count('id') as count")])
         ->oldest("mois")
         ->where(["annee" => date("Y"), "deleted" => 0])
         ->groupBy("mois")
         ->get();
         return $rows;
      }

      public static  function currentsMonths(){
         $rows = Annonce::
         select(["mois"])->distinct()
         ->oldest("mois")
         ->where(["annee" => date("Y"), "deleted" => 0])
         ->get();
         return $rows;
      }

      public static function itemOfWeek()
      {
         $items = Annonce::select([DB::raw("count('id') as count")])
         ->whereBetween('created_at', 
                 [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
             )
         ->where(["deleted" => 0])
         ->first();
         return $items->count;
      }

      public static function itemOfMonth()
      {
         $items = Annonce::select([DB::raw("count('id') as count")])
         ->where('mois', date("m"))
         ->where(["deleted" => 0])
         ->first();
         return $items->count;
      }

      public static function itemOfYear()
      {
         $items = Annonce::select([DB::raw("count('id') as count")])
         ->where('annee', date("Y"))
         ->where(["deleted" => 0])
         ->first();
         return $items->count;
      }


      public static function dates(){
         $rows = Annonce::select(["id","created_at"])->get();
         return (!is_null($rows)) ? $rows : null;
      }

      public static function fillDates(){
         if (!is_null(self::dates())) {
            foreach (self::dates() as  $val) {
               $exp_bar = explode(" ",trim($val->created_at));
               $exp_sep = explode("-",trim($exp_bar[0]));
               $array = ["mois" => $exp_sep[1], "annee" => $exp_sep[0]];
               if(is_null($val->mois)){
                  $val->update($array);
               }
            }
         }
         return true;
      }
   }