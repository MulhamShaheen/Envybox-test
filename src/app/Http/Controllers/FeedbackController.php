<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function submitFeedback(Request $request){
        
        // validate
        // dd($request->all());
        $message = factory(App\Http\Models\Message)->create($request->all());
        $message->save();


    }
}
