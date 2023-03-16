<?php
namespace App\Helpers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \Intervention\Image\Facades\Image as Image;


class Helpers
{
    protected $array = [];



    public static function websitEmail(){
        return "no-reply@vintage.alloservice.ci" ;#'franckahiley@yahoo.com';
    }
    /**
     * Helper Principal
     * Tous les autres helpers héroterons de cette classe
     * 
    */


     /**
     * Fonction magique pour Uploader des fichier dans un répertoir
     *
     * @param HttpRequest $request
     * @param string $uploadDirectory : Upload directory
     * @param string $label : Name of the data saved
     * @param string $inputName : HTML file input name
     * @return string : The new file saved name
     */
    public static function uploadFile(string $uploadDirectory = "uploads/annonces/", $label = "image", $inputName)
    {
        $fileName = $label."_". Str::random(6).'.'. request()->file($inputName)->extension();
        $fileName = Helpers::filterstring($label)."_". Str::random(6).'.'. request()->file($inputName)->extension();

        $uploadedFileName = request()->file($inputName)->storeAs(Helpers::domaine().$uploadDirectory, $fileName, ['disk' => 'public_uploads']);
        return $uploadedFileName;
    }



    /**
     * Uploader des fichiers [Images] et les rédimensionner
     *
     * @param Request $request
     * @param [type] $inputName
     * @param string $uploadDirectory
     * @param string $label
     * @return string|void
     */
    public static function makFile(Request $request,$inputName,  string $uploadDirectory = 'uploads/annonces/', $label = "photo_article_")
    {
            $formImage = request()->file($inputName);
            $imageName = Helpers::filterstring( $label)."_". Str::random(6).'.'. $formImage->extension();

            $target = $uploadDirectory.$imageName;
            $Image = Image::make($formImage->getRealPath());
            $Image->resize(null, 460, function ($constraint) {
                $constraint->aspectRatio();
                //$constraint->upsize();
            });
            $Image->save(Helpers::domaine().$target);
            return $target;
    }



    /**
     * Fonction magique pour inserer des retour  la ligne à un texte.
     *
     * @param string $text
     * @return mixed
     */
    public static function formatText($text)
    {
        return str_replace(["\n","\n\n", "\n\n\n"], "<br>", trim($text));
    }


    /**
     * Retourne le premier caractère d'un nom, chaine, etc.
     *
     * @param string $string
     * @return string
     */
    public static function pseudo(string $string)
    {
        return substr($string ,0,1); //
    }



    public static function findText($key)
    {
        return !is_null($key) ? 'Modifier' : 'Ajouter';
    }

    public static function border($key)
    {
        return !is_null($key) ? 'edit' : 'store';
    }

    /**
     * Créer un retour à la ligne avec encode HTML
     *
     * @param string $longText
     * @return mixed
     */
    public static function encodeText(string $longText)
    {
        return str_replace("<br>", "\n", trim($longText));
    }


    /**
     * Fonction pour formater un Montant d'argent: 25000 => 25 000
     *
     * @param integer $money
     * @return void
     */
    public static function moneyFormat(int $money)
    {
    (int) $money = (int) $money;
        return isset($money)  ? number_format($money, 0, '', ' ') : 'indéfini';
    }

    public static function phone($phone)
    {
    (int) $phone = (int) $phone;
        return isset($phone)  ? number_format($phone, 0, '-', ' ') : 'indéfini';
    }


    /**
     * Les pages du site
     *
     * @return array
     */
    public static function pages():array 
    {
       $pages = [
        "contact",
        "opportunite",
        "prestation",
        "presentation",
        "realisation",
        ];
        return $pages;
    }



    /**
     * Remplacer les carctères spéciaux par des lettes simples
     *
     * @param [type] $text
     * @return string
     */
    public static  function replaceString($text)
    {
        $utf8 = array(
            // '/[:.;,!]/u' => '',
            '/[áàâãªä]/u' => 'a',
            '/[ÁÀÂÃÄ]/u' => 'A',
            '/[ÍÌÎÏ]/u' => 'I',
            '/[íìîï]/u' => 'i',
            '/[éèêëè]/u' => 'e',
            '/[ÉÈÊË]/u' => 'E',
            '/[óòôõºö]/u' => 'o',
            '/[ÓÒÔÕÖ]/u' => 'O',
            '/[úùûü]/u' => 'u',
            '/[ÚÙÛÜ]/u' => 'U',
            '/ç/' => 'c',
            '/Ç/' => 'C',
            '/ñ/' => 'n',
            '/Ñ/' => 'N',
            '/---/'=>'',
            '/----/'=>'',
            '/--/'=> ''
        );
        //
        //
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }


    /**
     * Remplacer les espaces des séparateurs
     *
     * @param [type] $string
     * @return mixed
     */
    public static function filterstring($string)
    {
        return strtolower(self::replaceString(str_replace([' ','?', '&', "  ",'#','+','x','*','.',"@",";",",","/", "'",":"],'-',str_replace(['--','---','----'],'-', $string))));
    }



    public static function wordwrap($string)
    {
        $exp = explode(" ", strtolower($string));
        $word = "";
        $word .= isset($exp[0]) ? trim($exp[0]). " " : "";
        $word .= isset($exp[1]) ? trim($exp[1]). " " : "";
        $word .= isset($exp[2]) ? trim($exp[2]). " " : "";
        $word .= isset($exp[3]) ? trim($exp[3]). " " : "";
        return trim($word);
    }


    public static function filetype($filename)
   {
    if (isset($filename)) {
        $WordFiles = array("docs", "docx", "doc");
        $ExcelFiles = array("xlx", "xl", "xls", "xlsx");
        $ArchiveFiles = array("zip", "rar", "rar4");
        $MediaFiles = array("png", "jpeg", "jpg", "gif", "ico");
        $PdfFiles = array("PDF", "pdf", "pd", "ft");
        $PowerPFile = array("pptx", "ppt", "ppts");
        $code = array("PHP", "php", "JS");
        $AI = array("ai", "AI", "EPS", 'eps');
        $PS = array("PSD", "ps", "psd");
        $explode = explode(".", $filename);
        $fileExtension = end($explode);

        if (in_array($fileExtension, $code)) {
            $fileType = "PHP";
        } 
        if (in_array($fileExtension, $AI)) {
            $fileType = "Adobe Illustrator";
        }
        if (in_array($fileExtension, $PS)) {
            $fileType = "Adobe Photoshop";
        }
        if (in_array($fileExtension, $WordFiles)) {
            $fileType = "Word";
        }  
        if (in_array($fileExtension, $ExcelFiles)) {
            $fileType = "Excel";
        }  
        if (in_array($fileExtension, $ArchiveFiles)) {
            $fileType = "Zip";
        }  
        if (in_array($fileExtension, $MediaFiles)) {
            $fileType = "Image";
        }  
        if (in_array($fileExtension, $PdfFiles)) {
            $fileType = "PDF";
        }  
        if (in_array($fileExtension, $PowerPFile)) {
            $fileType = "PowerPt";
        } 
        return $fileType;
        }
    }


    public static function page_active(string $uri)
    {
        return ((trim(request()->path()) ===  $uri )) ? 'active' :'';
    }

    public static function page_contains(string $string){
        $exp =  explode('/',request()->path());
        $keyOne = (count($exp) > 1) ? $exp[1] : null;
        return (trim($exp[0]) ===  $string) || trim($keyOne) ===  $string ? 'active' :'';
    }


    public static function statut(int $statut){
        $span = null;
        if($statut === 0){ $span = '<small class="badge bg-warning mob-block">   En attente  </small>';}
        
        if($statut === 1)  { $span = '<small class="badge bg-success mob-block">   En ligne  </small>';}

        if($statut === 2){ $span = '<small class="badge bg-danger mob-block">   Rejetée  </small>' ;}
    
        if($statut === 4){ $span = '<small class="badge bg-warning mob-block"> Désactivée  </small>' ;}
        return $span;
    }
    public static function statutText(int $statut)
    {
        return $statut === 1  ? "Désactiver" : "Activer";
    }



    public static function vip_statut(int $statut){
        $span = null;
        if($statut === 0){ $span = '<span class="badge bg-warning ">Arrêtéé</span>';}
        if($statut === 1)  { $span = '<span class="badge bg-success ">Active</span>';}
        if($statut === 2){ $span = '<span class="badge bg-danger ">Rejetée</span>' ;}
        return $span;
    }



    public static function etatAchat(int $statut){
        $span = null;
        if($statut === 0){ $span = '<span class="badge bg-warning ">En attente</span>';}
        if($statut === 1)  { $span = '<span class="badge bg-success ">Validé</span>';}
        if($statut === 2){ $span = '<span class="badge bg-danger ">Annulé</span>' ;}
        if($statut === 3){ $span = '<span class="badge bg-danger ">Supprimé</span>' ;}
        return $span;
    }


    public static function pageTitle($field)
    {
        $page = Page::where('pk', 2022)->first()->toArray();
        return !is_null($page) ? $page[$field] : null;
    }

    public static function disabled($statut)
    {
        if((int) $statut === 2 ||(int)  $statut === 3){
            return true;
        }else{
            return false;
        }
    }


    public static  function match(string|int $first_value = null, string|int $second_value = null){
        if(is_int($first_value)){
          if((int) ($first_value) === (int) ($second_value)){
             return true;
          }
        }
 
        if(is_string($first_value)){
          if(trim($first_value) === trim($second_value)){
             return true;
          }
        }
        return false;
      }

      /**
      * Vérifier si des données|clés sont définis
      *
      * @param array|string|null $keys
      * @return integer
      */
     public static function validate(array|string $keys = null): int{
        $c = 0;
        if(is_string($keys)){
          if(!isset($keys) || is_null($keys) || empty(trim($keys))){
             $c +=  1;
          }else{
             $c +=  0;
          }
        }

        if(is_array($keys)){
          foreach($keys as $k){
             if(!isset($k) || is_null($k) || empty(($k))){
                $c +=  1;
             }else{
                $c +=  0;
             }
          }
        }

        return $c;
   }


    /**
      * Vérifier si un élément existe en BD
      *
      * @param string $table
      * @param string|integer $Id
      * @param string $field
      * @return boolean
      */
      public static function existThis(string $table, string $field = null, string|int $Id = null, $statusField = "deleted", $statut = 0){
        $row =  DB::table($table)->where([$field => $Id, $statusField => $statut])->first();
        return (!is_null($row)) ? true : false;
      }



      public static function legend(string|int $string = 0)
    {
        switch ($string) {
            case 0:
                return ["text" => "Annonce en cours", "color" => "#556ee6"];
                break;
            case 1:
                return ["text" => "Annonce Validées", "color" => "#34c38f"];;
                break;
            case 2:
                return ["text" => "Annonce Refusées", "color" => "#f46a6a"];
                break;
            case 3:
                return ["text" => "Annonce Retirées", "color" => "#f00"];
                break;

            default:
                return ["text" => "Annonce en cours", "color" => "#556ee6"];
                break;
        }
    }


    public static function legendTwo(string|int $string = 0)
    {
        switch ($string) {
            case 0:
                return ["text" => "En cours", "color" => "#556ee6"];
                break;
            case 1:
                return ["text" => "Validées", "color" => "#34c38f"];;
                break;
            case 2:
                return ["text" => "Annulées", "color" => "#f46a6a"];
                break;

            default:
                return ["text" => "En cours", "color" => "#556ee6"];
                break;
        }
    }



    public static function color($classe = null)
    {
        for ($i = 0; $i < 25; $i++) :
            switch ($classe) {
                case 1:
                    return "#198a00";
                    break;
                case 2:
                    return "#69115f";
                    break;
                case 3:
                    return "#0007ce";
                    break;
                case 4:
                    return "#eab202";
                    break;
                case 5:
                    return "#007162";
                    break;
                case 6:
                    return "#1d1d1d";
                    break;
                case 7:
                    return "#630101";
                    break;
                case 8:
                    return "#698547";
                    break;
                case 9:
                    return "#f0efbb";
                    break;
                case 10:
                    return "#bb20bb";
                    break;
                case 11:
                    return "#ccffff";
                    break;
                case 12:
                    return "#0d6efd";
                    break;
                case 13:
                    return "#20c997";
                    break;
                case 14:
                    return "#6c757d";
                    break;
                case 15:
                    return "#eff452";
                    break;
                case 16:
                    return "#0dcaf0";
                    break;
                case 17:
                    return "#6f42c1";
                    break;
                case 18:
                    return "#00acee";
                    break;
                case 19:
                    return "#ffab10";
                    break;
                case 20:
                    return "#11b76b";
                    break;
                case 21:
                    return "#0dfdb0";
                    break;
                case 22:
                    return "#ff4747";
                    break;
                default:
                    return "#ff6f00";
                    break;
            }
        endfor;
    }

    public static function file_path($fileimage = null){
        return 'http://vintage.test/' .$fileimage; //'http://vintage.alloservice.ci/'

    }

    public static function domaine(){
        return 'C:\laragon\www\vintage\public/';
    }
}
