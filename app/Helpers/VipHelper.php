<?php
namespace App\Helpers;
use App\Helpers\Helpers;
use App\Models\OffreVip;

class VipHelper extends Helpers
{
    protected $taux = 0;
    protected $montantTotal = 0;
    protected $montantReduit = 0;
    protected $NetAPayer     = 0;
    protected $NbreDeJour = 0;
    protected $coutParJour = 0;


    /**
     * ========================================
     * ======= Helper des Offres VIP ==========
     * ========================================
    */



    //*============= Les Setteurs

    public function setMontantTotal(int $montantTotal)
    {
       return $this->montantTotal = $montantTotal;
    }

    public function setMontantReduit(int $montantReduit)
    {
        return $this->montantReduit = $montantReduit;
    }

    public function setTaux(int $taux){
        return $this->taux = $taux;
    }

    public function setNetAPayer(int $NetAPayer){
        return $this->NetAPayer = $NetAPayer;
    }

    public function setNbreDeJour(int $NbreDeJour){
        return $this->NbreDeJour = $NbreDeJour;
    }


    public function setCoutParJour(int $coutParJour){
        return $this->coutParJour = $coutParJour;
    }


    //*=================== Les Getteurs
    public function getMontantTotal()
    {
       return $this->montantTotal;
    }

    public function getMontantReduit()
    {
        return $this->montantReduit;
    }

    public function getTaux(){
        return $this->taux;
    }

    public function getNetAPayer(){
        return $this->NetAPayer;
    }

    public function getNbreDeJour(){
        return $this->NbreDeJour;
    }


    public function getCoutParJour(){
        return $this->coutParJour;
    }

    //*============= Methods Utilitaires

    /**
     * Montant Total à payer après réduction
     *
     * @param integer $taux
     * @param integer $coutParJour
     * @param integer $NbreDeJour
     * @return int
     */
    public static function netApayer(int $taux, int $coutParJour, int $NbreDeJour){
       return  self::NetparJour($taux, $coutParJour)  * $NbreDeJour;
    }

    /**
     * Retourne la montant de la réduction
     *
     * @param [type] $taux
     * @param [type] $coutParJour
     * @return int
     */
    public static function reduction($taux, $coutParJour){
        return (int) ($taux * $coutParJour) / 100;
    }

    /**
     * Retourne le montant Net par Jour
     *
     * @param integer $taux
     * @param integer $coutParJour
     * @return int
     */
    public static function NetparJour(int $taux, int $coutParJour){
        return $coutParJour - self::reduction($taux, $coutParJour);
    }

    public  static function selections(OffreVip $offrevip)
    {
      return $offrevip->annonces()->count();
    }

}
