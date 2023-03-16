<?php

namespace App\Helpers;

use App\Models\Visite;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Agent as MetaAgent;

class Agent {

    /**
     * Helper sur le terminal utilisé par les utilisateur
    */
    protected static $Agent;
    protected static
    $device, 
    $language, 
    $Desktop;
    
    /**
     * Instanciation de la class JessengerAgent::class
     */
    public static  function setAgent()
    {
       return self::$Agent = new MetaAgent();
    }


    public static  function plateform() // Retourne le type de système d'exp.
    {
        return self::setAgent()->platform();
    }

    public static function browser() // Le navigateur
    {
        return self::setAgent()->browser();
    }

    public static function version($device) // La version [navigateur/syst d'exp.]
    {
        return self::setAgent()->version($device);
    }

    public static function language() // La langue du pays du visiteur
    {
        return self::setAgent()->languages();
    }

    public static function device()
    {
        return self::setAgent()->device();
    }

    public static function isPhone()
    {
        return self::setAgent()->isPhone();
    }

    public static function isDesktop()
    {
        return self::setAgent()->isDesktop();
    }

    public static function isMobile()
    {
        return self::setAgent()->isMobile();
    }

    public static function isTablet()
    {
        return self::setAgent()->isTablet();
    }

    public static function ip()
    {
        return request()->ip();
    }


    /**
     * Undocumented function
     *
     * @return string
     */
    public static function getDevice(): string
    {
        $plateform = null;
        if(self::isDesktop()){
            $plateform = "Ordinateur";
        }
        if(self::isTablet()){
            $plateform = "Tablette";
        }

        if(self::isMobile()){
            $plateform = "Mobile";
        }

        if(self::setAgent()->isRobot()){
            $plateform = "Roboto";
        }
        return $plateform;
    }

    /**
     * J'enregistre chaque visiteur
     *
     * @return bool
     */
    public static function visiteCount(){
        $array = [
            "user_ip" => self::ip(),
            "plateform" => self::plateform(),
            "device"    => self::getDevice(),
            "browser"   => self::browser(),
        ];
        Visite::create($array);
        return true;
    }

    /**
     * Nombre total de visistes
     * dans la table
     *
     * @return int
     */
    public static function visites(){
        return Stat::visites();
    }
}