<?php
namespace App\Helpers;

use App\Helpers\Helpers;
use App\Helpers\User;
use App\Models\User as UserModel;
use App\Mail\UserAfterPostMail;
use App\Models\Annonce;
use App\Models\Notification as NotificationModel;
use App\Models\UserLog;
use Illuminate\Support\Facades\Mail;

;

class Notification extends Helpers
{
    /**
     * 
     * Helper des Noitifications sur le site
     * 
     * 
     */
    
     protected $subject = null;
     protected $details = null;
     protected $elementId = null;
     protected $open = false;
     protected static $datas  = [];

     public function __construct($datas)
     {
        
     }


    public static function  setSubject($subject){
        self::$subject = $subject;
    }

    public static  function getSubject()
    {
        return self::$subject;
    }

    public static function  setElementId($elementId){
        self::$elementId = $elementId;
    }

    public static  function getElementId()
    {
        return self::$elementId;
    }

    public static function  setOpen($open){
        self::$open = $open;
    }

    public static  function getOpen()
    {
        return self::$open;
    }


    public static function  setDetails($details){
        self::$details = $details;
    }

    public static  function getDetails()
    {
        return self::$details;
    }


     public static function make(Object $datas, $userId = null)
     {
        $array = [
            "user_id" => !is_null($datas->user_id) ? $datas->user_id : $userId,
            "subject" => $datas->subject,
            "details" => $datas->details,
            "annonce_id" => $datas->annonce_id,
        ];
       return  NotificationModel::create($array);
     }


     public static function confirmation($type, $annonce)
     {
        $array = [
            "subject" => self::template($type, $annonce)['subject'],
            "details" => self::template($type, $annonce)['details'],
            "annonce_id" => $annonce->id,
            "user_id" => $annonce->user_id,
        ];
       return  NotificationModel::create($array);
     }



     /**
      * Undocumented function
      *
      * @param [type] $subject
      * @param [type] $details
      * @param [type] $annonce_id
      * @return mixed
      */
     public static function userLog($subject,$details, $annonce_id = null)
     {
        $array = [
            "subject" => $subject,
            "details" => $details,
            "annonce_id" => $annonce_id,
        ];
       return  $array; //UserLog::create($array);
     }



     public static function mail(UserModel $user, Annonce $annonce, $url)
     {
        return Mail::to($user->user_email)
                ->send(new UserAfterPostMail($user, $annonce, $url));
     }


     //* Stop
     public static function mailValidated(UserModel $user, Annonce $annonce, $url){
        return Mail::to($user->user_email)
                ->send(new UserAfterPostMail($user, $annonce, $url));
     }



     public static function template($type, $data)
     {
         
         if ((int) $type === 2) {
             self::$datas = [
                 "details" => 
                    "Votre annonce:". $data->titre . "  a été rejetée. ",
                 "subject" => "Annonce rejetée"
             ];
         }
 
         if ((int) $type === 1) {
             self::$datas = [
                 "details" => "Votre annonce:  ". $data->titre . "  est en ligne.",
                 "subject" => "Annonce en ligne"
             ];
         }
 
         return self::$datas;
     }

     /**
      * Undocumented function
      *
      * @param string $subject
      * @param string $details
      * @param string $annonce_id
      * @return object|mixed
      */
     public static function makeLog($subject,$details, $annonce_id = null)
     {
        $array = [
            "subject" => $subject,
            "details" => $details,
            "annonce_id" => $annonce_id,
        ];
       return  UserLog::create($array);
     }

     /**
      * Créer une Notification
      *
      * @param string $subject
      * @param string $details
      * @param object|null $annonce
      * @param integer|null $userId
      * @return mixed
      */
     public static function notificate(string $subject, string $details, object $annonce = null, int $userId = null){
        $array = [
            "subject" => $subject,
            "details" => $details,
            "annonce_id" => !is_null($annonce) ? ($annonce->id) : null,
            "user_id" => !is_null($annonce->user_id) ? $annonce->user_id : $userId,
        ];
       return  NotificationModel::create($array);
     }
}
