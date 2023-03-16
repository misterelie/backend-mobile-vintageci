<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\Commune;
use App\Models\PurchaseCredit;
use App\Models\User;
use App\Helpers\User  as UserHelper;
use Illuminate\Http\Request;

class UserPurchaseController extends Controller
{
    public function __construct()
    {
         parent::boot();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Mes annonces | Tableau de bord ";
        $purchases = PurchaseCredit::with(["credit"])->where(["user_id" => UserHelper::userId(), 'deleted' => 0])->latest()->paginate(10);

        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.purchase.all", compact(["page_title", "purchases", "categories", "communes"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseCredit  $purchaseCredit
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseCredit $purchaseCredit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseCredit  $purchaseCredit
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseCredit $purchaseCredit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseCredit  $purchaseCredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseCredit $purchaseCredit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseCredit  $purchaseCredit
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request){
        
        $datas = [
            "photo_1" => null, 
            "photo_2" => null, 
            "photo_3" => null, 
            "photo_4" => null, 
            "photo_5" => null, 
            "photo_6" => null, 
            "photo_7" => null, 
            "photo_8" => null, 
            "photo_9" => null, 
        ];

        if(!is_null($request->photo_1)){
            $datas['photo_1'] = Helpers::makFile($request,$request->photo_1);
        }

        if(!is_null($request->photo_2)){
            $datas['photo_2'] = Helpers::makFile($request,$request->photo_2);
        }
        if(!is_null($request->photo_3)){
            $datas['photo_3'] = Helpers::makFile($request,$request->photo_3);
        }
        if(!is_null($request->photo_4)){
            $datas['photo_4'] = Helpers::makFile($request,$request->photo_4);
        }
        if(!is_null($request->photo_5)){
            $datas['photo_5'] = Helpers::makFile($request,$request->photo_5);
        }
        if(!is_null($request->photo_6)){
            $datas['photo_6'] = Helpers::makFile($request,$request->photo_6);
        }
        if(!is_null($request->photo_7)){
            $datas['photo_7'] = Helpers::makFile($request,$request->photo_7);
        }
        if(!is_null($request->photo_8)){
            $datas['photo_8'] = Helpers::makFile($request,$request->photo_8);
        }
        if(!is_null($request->photo_9)){
            $datas['photo_9'] = Helpers::makFile($request,$request->photo_9);
        }
        return $datas;
    }
}
