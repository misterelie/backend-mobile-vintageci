<?php

namespace App\Http\Controllers\User;
use App\Helpers\Stat;
use App\Models\Photo;
use App\Helpers\Agent;
use App\Models\Annonce;
use App\Models\Commune;
use App\Models\UserLog;
use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\OffreVip;
use App\Models\SousCategory;
use Illuminate\Http\Request;
use App\Helpers\Notification;
use App\Mail\NewAnnonceEmail;
use App\Helpers\User as UserHelper;
use App\Http\Controllers\Controller;
use App\Mail\UserVipAnnoncNotification;
use App\Models\AnnonceVip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use \Intervention\Image\Facades\Image as Image;

use Closure;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class UserAnnonceController extends Controller
{
    public function __construct()
    {
         parent::boot();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        //* Datas
        $page_title = "Publier une annonce | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->oldest("commune")->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();

        //* View
        return view("interface.pub_annonce", compact(["page_title", "categories", "sous_categories", "communes"]));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        /**
     * Publier une annonce
     */
    public function store(Request $request){

        //dd($request->all());
        $request->validate([
            "category" => "required",
            // "sous_category" => "required",
            "commune" => "required",
            "titre" => "required|min:4",
            "prix" => "required",
            "details" => 'required|min:8',
            "photo_1" => 'required',
        ]);
        
        $annonce = Annonce::create([
            "category_id" => $request->category,
            "sous_category_id" => $request->sous_category,
            "commune_id" => $request->commune,
            "titre" => $request->titre,
            "prix" => $request->prix,
            "details" => Helpers::formatText($request->details),
            "photo_1" => $request->hidden_photo_1 ,
            "photo_2" => $request->hidden_photo_2, 
            "photo_3" => $request->hidden_photo_3 ,
            "photo_4" => $request->hidden_photo_4 ,
            "photo_5" => $request->hidden_photo_5 ,
            "photo_6" => $request->hidden_photo_6 ,
            "photo_7" => $request->hidden_photo_7 ,
            "photo_8" => $request->hidden_photo_8 ,
            "photo_9" => $request->hidden_photo_9 ,
        ]);

        if ($annonce) {
            //* Envoyer la notification par email*/
            $url = url('/backend/annonces');
            Mail::to(Helpers::websitEmail())
            ->send(new NewAnnonceEmail($annonce, $url));

            //* Notifier l'utilisateur:
            $array = new UserLog(Notification::userLog("Nouvelle annonce ", "Votre annonce ". $annonce->titre ." du ". date('d/m/Y à H:i'). " est en ligne.", $annonce->id));
            
            //* Activité utilisateur:
            $logs = $annonce->user->logs()->save($array);
            Notification::notificate("Nouvelle annonce", " Votre annonce: ".$annonce->titre." a bien été publiée",$annonce, UserHelper::userId() );

            //* Notification par Email à l'utilisateur;
            $urlPoste = url("/annonces/new");
            Notification::mail($annonce->user, $annonce, $urlPoste);  // Email de notification

            return redirect()->to(url('/poste/notification'))->with('success', 'Annonce publiée ! Votre annonce a été publiée avec succès. Elle est en attente de validation. ');
        } else {
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit($annonce)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
         //* Datas
         $page_title = "Modifier l'annonce | Vintage";
         $categories = Category::select("id", "category")->latest()->get();
         $communes = Commune::select("id", "commune")->latest()->get();
         $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
         $annonce = Annonce::where("pk", $annonce)->first();
        
         return view("seller.annonces.edit", compact(["page_title", "categories", "sous_categories", "communes", "annonce"]));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
            $validated = $request->validate([
                "category" => "required",
                "commune" => "required",
                "titre" => "required|min:4",
                "prix" => "required|integer",
                "details" => 'required|min:8',
            ]);
    
            if(is_null($request->sous_category))
            {
                $sous_category = $annonce->sous_category_id;
            }else{
                $sous_category = $request->sous_category;
            }
            
            $updateArray = [
                "category_id" => $request->category,
                "sous_category_id" => $sous_category,
                "commune_id" => $request->commune,
                "titre" => $request->titre,
                "prix" => $request->prix,
                "statut" => 0,
                "details" => Helpers::formatText($request->details),
            ];
    
            if($request->photo_1 != null){
                $photo_1 = 
                Helpers::makFile($request,"photo_1","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_1" => $photo_1]);
               
            }
            if($request->photo_2 != null){
                $photo_2 =Helpers::makFile($request,"photo_2","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_2" => $photo_2]);
               
            }
            if($request->photo_3 != null){
                $photo_3 = Helpers::makFile($request,"photo_3","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_3" => $photo_3]);
            }
            if($request->photo_4 != null){
                $photo_4 = Helpers::makFile($request,"photo_4","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_4" => $photo_4]);
            }
            if($request->photo_5 != null){
                $photo_5 = Helpers::makFile($request,"photo_5","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_5" => $photo_5]);
            }
            if($request->photo_6 != null){
                $photo_6 = Helpers::makFile($request,"photo_6","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_6" => $photo_6]);
            }
            if($request->photo_7 != null){
                $photo_7 = Helpers::makFile($request,"photo_7","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_7" => $photo_7]);
            }
            if($request->photo_8 != null){
                $photo_8 = Helpers::makFile($request,"photo_8","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_8" => $photo_8]);
            }
            if($request->photo_9 != null){
                $photo_9 = Helpers::makFile($request,"photo_9","uploads/annonces/",$request->titre);
                $updateArray = array_merge($updateArray, ["photo_9" => $photo_9]);
            }
    
            if ($annonce->update($updateArray)) {
                return redirect()->to(url('account/mes-annonces'))->with('success', 'Annonce Mise à jour avec succès ! Votre annonce a bien été modifiée . ');
            } else {
                return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
            }
    }



    
        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
   
   
   
   
   
    public function destroy(Request $request, Annonce $annonce)
    {

        $array = [
            "retire" => true,
            "motif" => $request->raison,
        ];
        $query = $annonce->update($array);
        if($query)
        {
            return redirect()->to(url('/account/mes-annonces'))->with('success', 'Réussite. Vote annonce a bien été supprimée. Elle ne sera plus disponible sur le site');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }



    public function delete($pk)
    {
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonce = Annonce::where("pk", $pk)->first();
        $page_title = $annonce->titre. " | Vintage";
        return view("seller.annonces.stop-delete", compact(["page_title", "annonce", "categories"]));
    }



    public function toggle(Annonce $annonce){
        $array = [
            'statut'=> ((int) $annonce->statut != 4) ? 4 : 0,
        ];
        
        if($annonce->update($array))
        {
            //*Envoyer le mail de notification à l'utilisateur
            if (!is_null($annonce->user) && $annonce->statut === 4) {
                //* Notification à l'utilisateur
                Notification::notificate("Annonce désactivée", "Votre annonce ". $annonce->titre." a été désactivée ", $annonce, UserHelper::userId());
            }
            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. L'utilisateur recevra un Email de notification sur votre décision");
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }






    
    public function storeImage(Request $request){
         $imageName  = null;
         $datas = [
            "type" => null,
            "message" => null,
            "data" => [],
         ];

        $label = (!is_null($request->titre) && !empty($request->titre)) ? $request->titre : "image_";
        if(!is_null($request->_input)){
            $imageName = Helpers::makFile($request,$request->_input,"uploads/annonces/",$label);
            if($imageName){
                $datas = [
                    "type" => "success",
                    "message" => "photo 1 téléchargée avec succès",
                    "data" => [
                        "photo" => $imageName,
                    ]
                ];
            }
        }
        return json_encode($datas);
    }



        public function removeImage(Request $request){
         $datas = [
            "type" => null,
            "message" => null,
            "data" => [],
         ];

         if(!is_null($request->_input) && !is_null($request->anonce_id)){
            $annonce = Annonce::where(["id" => $request->anonce_id])->first();
            $array = ["$request->_input" => NULL];
            $annonce->update($array);
            $datas = [
                "type" => 'success',
                "message" => "L'image a bien été supprimée.",
            ];
         }else{
            $datas = [
                "type" => 'error',
                "message" => 'Une erreur inconnue est survenue. Veuillez réssayer.',
             ];
         }

        return json_encode($datas);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function pricePromo(Request $request, Annonce $annonce)
    {
        if(is_null($request->prix_promo)){
            return redirect()->back()->with('error', 'Veuillez renseigner un prix promo valide'); 
        }

        if($request->prix_promo >= $annonce->prix){
            return redirect()->back()->with('error', 'Le prix promo doit être inférieur au prix initial.'); 
        }

        $updateArray = [
            "prix" => $request->prix_promo,
            "prix_promo" => $request->prix,
        ];
    
        if ($annonce->update($updateArray)) {
            return redirect()->to(url('account/mes-annonces'))->with('success', 'Annonce Mise à jour avec succès ! Votre annonce a bien été modifiée . ');
        } else {
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }




}
