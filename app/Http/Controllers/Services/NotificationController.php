<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Helpers\User;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function toggle(Notification $notification)
    {
        $user = User::user();
        if(is_null($user)){
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue.');
        }
       $notifications =  $user->notifications()->get();
       if(!is_null($notifications)){

        $array = ['open'=> 1];
            foreach($notifications as $n){
                $n->update($array);
            }
       }
       return redirect()->back()->with('success', 'Opérationeffectuée avec succès.');
    }


    public function remove(Notification $notification)
    {
        $user = User::user();
        if(is_null($user)){
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue.');
        }
       $notifications =  $user->notifications()->get();
       if(!is_null($notifications)){

        $array = ['deleted'=> 1];
            foreach($notifications as $n){
                $n->update($array);
            }
       }
       return redirect()->back()->with('success', 'Opérationeffectuée avec succès.');
    }

    
}
