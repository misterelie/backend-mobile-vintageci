<?php
namespace App\Helpers;

class Dates extends Helpers
{
    /**
     * Helpers pour manipuler les dates, le temps, etc.
     * Il étend d uHelper principal
     */

/**
     * Helpers pour manipuler les dates, le temps, etc.
     * Il étend d uHelper principal
     */

    public static function formatFr($date)
    {
       return date("d-m-Y à H:i", strtotime($date));
    }


    /**
     * Formater une date en style numérique francais
     *
     * @param string $date
     * @return string
     */
    public static function format($date)
    {  $exp = explode(' ', trim($date));
       if(count($exp) >= 2){
           return date("d/m/Y à H:i", strtotime($date));
       }else{
           return date("d/m/Y", strtotime($date));
       }
       
    }

    
   public static function ago($time)
   {
       $time = strtotime($time);
       $diff_time = time() - $time;
       //* On retourne un message si le temps à inférieur à 1
       if ($diff_time < 1) {
           return "maintenant";
       }
       $sec = array(
           31536000 => "an",
           2592000 => "mois",
           604800 => "semaine",
           86400 => "jour",
           3600 => "heure",
           60 => "minute",
           1 => "seconde"

       );
       foreach ($sec as $sec => $value) {
           $div = $diff_time / $sec;
           if ($div >= 1) {
               $time_ago = round($div);
               $time_type = $value;

               if ($time_ago > 1 && $time_type != "mois") {
                   $time_type .= "s";
               }
               return  $time_ago . " " . $time_type;
           }
       }
   }


    /**
    * Formater la date MySQl en format JJ-MM-AAAA
    *
    * @param string|null $date
    * @return void
    */
   public static function formaterDateComplet(string $date = null)
   {
       $exp = explode(" ", trim($date));

       $date = isset($exp[0]) ? $exp[0] : $date;
       $formatedDate = "";
       if (isset($date) && $date != null) {
           $formatedDate = date("d-m-Y", strtotime($date));
       } else {
           $formatedDate = "";
       }
       return $formatedDate;
   }



   public static function dateFr( string $date)
   {
       if($date){

           if($date === date("d-m-Y H:i:s"))
           {
               return "Aujourd'hui";
           }else{
           (string)  $date = self::formaterDateComplet($date); // Reformater la dare sous format Francais.
               $explode_chaine = explode(" ", trim($date));
               $Date = $explode_chaine[0];
               $Heure = (array_key_exists(1, $explode_chaine)) ? $explode_chaine[1] : '';
               $explode_date = explode("-", trim($Date));
               $Jour = $explode_date[0];
               $Mois = $explode_date[1];
               $Annee = $explode_date[2];
               if($Heure)
               {
                   //* Reformater la date
                   $expTime = explode(":", trim($Heure));
                   $h = $expTime[0];
                   $m = $expTime[1];
                   $s = $expTime[2];
                   $n_h = str_replace($h, " à ".$h . "H: ", $h);
                   $n_m = str_replace($m, $m . "min", $m);
               }else{
                   $n_h = "";
                   $n_m = "";
               }

               //*----------------------------------------
               switch ($Mois) {
                   case "01":
                       $MoisName = " Janvier ";
                       break;
                   case "02":
                       $MoisName = " Fevrier ";
                       break;
                   case "03":
                       $MoisName = " Mars ";
                       break;
                   case "04":
                       $MoisName = " Avril ";
                       break;
                   case "05":
                       $MoisName = " Mais ";
                       break;
                   case "06":
                       $MoisName = " Juin ";
                       break;
                   case "07":
                       $MoisName = " Juillet ";
                       break;
                   case "08":
                       $MoisName = " Août ";
                       break;
                   case "09":
                       $MoisName = " Septembre ";
                       break;
                   case "10":
                       $MoisName = " Octobre ";
                       break;
                   case "11":
                       $MoisName = " Novembre ";
                       break;
                   case "12":
                       $MoisName = " Décembre ";
                       break;
               }

               $Mois = $Jour." ". str_replace($Mois, trim($MoisName), $Mois)." ".$Annee;
               return   $Mois . $n_h . $n_m;
           }
       }else{
           return "";
       }
       
   }


   public static function dateHeure($date){
       $exp = explode(" ", trim($date));
       return isset($exp[1]) ? $exp[1] : null;
   }



   public static function moisFr(string $string = null){
    $mois = null;
    switch ($string) {
        case "01":
            $mois = "Jan";
            break;
        case "02":
            $mois = "Fev";
            break;
        case "03":
            $mois = "Mars";
            break;
        case "04":
            $mois = "Avril";
            break;
        case "05":
            $mois = "Mais";
            break;
        case "06":
            $mois = "Juin";
            break;
        case "07":
            $mois = "Jui";
            break;
        case "08":
            $mois = "Août";
            break;
        case "09":
            $mois = "Sept";
            break;
        case "10":
            $mois = "Oct";
            break;
        case "11":
            $mois = "Nov";
            break;
        case "12":
            $mois = "Déc";
            break;

        return trim($mois);
    }
    return $mois;
   }
}