<?php
namespace App\Helpers;
use App\Helpers\Helper;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Site extends Helpers 
{
    protected static $confirmation = [];
    protected static $searchResult;
    

    public static function confirmationAlert($type, $data)
    {
        
        if ((int) $type === 2) {
            self::$confirmation = [
                "message" => "Votre annonce: <b> ". $data->titre . " </b> publié le ". Dates::formatFr($data->created_at). " a été rejetée. <br>  En effet, vous n'avez pas respectée certaines de nos règles de publication mentionnées à <a href=". url('/cgu')." > cette page. </a>  <br>",
                "subject" => "Annonce rejetée"
            ];
        }

        if ((int) $type === 1) {
            self::$confirmation = [
                "message" => "Votre annonce: <b> ". $data->titre . " </b> publié le ". Dates::formatFr($data->created_at). " est désormais en ligne. <br>  Obtenez le maximum de vues de votre annonces en mettant en avant à <a href=". url('/cgu')." > cette page. </a>  ",
                "subject" => "Annonce en ligne"
            ];
        }

        return self::$confirmation;
    }


    /**
     * Formulaire de recherche principale
     */
    public static function search($query, $cat = null)
    {
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])
        ->where(["deleted" => 0, "statut" => 1, "retire" => false])
        ->where("titre", 'like', "%$query%");
        if(!is_null($cat)){
            $annonces->where(["category_id" => $cat, "retire" => false]);
        }
        self::$searchResult =   $annonces->latest('created_at')->paginate(25);
        return self::$searchResult;
    }



    /**
     * Toutes les catégories du site:
     */
    public static function categories($limit = 100)
    {
       $categories =  DB::table("categories")->oldest()->limit($limit)->get();
       return !is_null($categories)  ? $categories : null;
    }

    public static function footerCategories($limit = 6)
    {
       $categories =  DB::table("categories")->limit($limit)->oldest()->get();
       return !is_null($categories)  ? $categories : null;
    }



    public static function marques($limit = 100)
    {
       $categories =  DB::table("marques")->select(['photo', 'marque'])->latest()->limit($limit)->get();
       return !is_null($categories)  ? $categories : null;
    }

    public static function vipAnnonces()
    {
        $datas = Annonce::
        join("categories", "categories.id", "=", "annonces.category_id")
        ->join("communes", "communes.id", "annonces.commune_id")
        ->join('annonce_vips', "annonce_vips.annonce_id", "annonces.id")
        ->where(['annonces.deleted'=> 0, "annonces.statut" => 1, "annonces.retire" => false])
        ->inRandomOrder()->latest("annonces.created_at")->limit(12)->get();

        return $datas;
    }

    public static function boostedAnnonces()
    {
        $datas = Annonce::select(["annonces.category_id","annonces.pk","annonces.commune_id","annonces.titre","annonces.prix","annonces.vue","annonces.photo_1","annonces.id", "categories.*", "communes.*", "annonce_vips.*"])
        ->join("categories", "categories.id", "=", "annonces.category_id")
        ->join("communes", "communes.id", "annonces.commune_id")
        ->join('annonce_vips', "annonce_vips.annonce_id", "annonces.id")
        ->where(['annonces.deleted'=> 0, "annonces.statut" => 1, "annonces.retire" => false])
        ->inRandomOrder()->latest("annonces.created_at")->paginate(10);
        return $datas;
    }

    public static function cats(){
    $categories = Category::select("id", "category")->oldest()->get();
      return  $categories ;
    }


    public static function numero(string $provider){
        $providers = [
            "wave"   => "(+225) 07 07 75 95 43",
            "orange" => "(+225) 07 07 75 95 43",
            "mtn"    => "(+225) 05 86 99 79 95",
            "moov"   => "(+225) 01 73 74 55 55 ",
        ];
        $provider = trim(strtolower($provider));
        return isset($providers[$provider]) ? $providers[$provider] : null;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function providers()
    {
        $providers = [
            1   => [
                "nom" => "wave",
                "numero" => "(+225) 07 07 75 95 43",
                "icon"   => "front/assets/images/pay-wave.jpg",
            ],
            2   => [
                "nom" => "orange",
                "numero" => "(+225) 07 07 75 95 43",
                "icon"   => "front/assets/images/pay-orange.jpg",
            ],
            3   => [
                "nom" => "moov",
                "numero" => "(+225) 01 73 74 55 55",
                "icon"   => "front/assets/images/pay-moov.jpg",
            ],
            4   => [
                "nom" => "mtn",
                "numero" => "(+225) 05 86 99 79 95",
                "icon"   => "front/assets/images/pay-mtn.jpg",
            ],
            
        ];

        return $providers;
    }
}
