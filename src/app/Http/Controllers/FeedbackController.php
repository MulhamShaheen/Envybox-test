<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use DB;

use App\Models\Message;
use App\Models\Setting;

use Inertia\Inertia;


class FeedbackController extends Controller
{
    public function submitFeedback(Request $request){
        
        // validate
        // dd($request->all());
        
        
        // dd($request->validate());
        // $validated = $request->validate();
        
        $validator = Validator::make($request->all(), [
            'name' => ["required"],
            'phone' =>["required", "regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/"]
            ])->validate();
            
        // dd($validator->fails());   
        $data = $request->only('name','phone','text');
        
        $message = factory(Message::class)->make($data);
        $message->save();

        Storage::disk('private_feedback')->append('feedback.txt', "name: $message->name, tel: $message->phone, msg: $message->text");

        if(Setting::where('key',"export")->get()->first()->value == "yes"){

            Config::set("database.connections.feedback_external", [
                'driver'    =>  Setting::where('key','driver')->get()->first()->value,
                "host"      =>  Setting::where('key','host')->get()->first()->value,
                "database"  =>  Setting::where('key','database')->get()->first()->value,
                "username"  =>  Setting::where('key','username')->get()->first()->value,
                "password"  =>  Setting::where('key','password')->get()->first()->value,
                "port"      =>  Setting::where('key','port')->get()->first()->value,
                'charset'   =>  Setting::where('key','charset')->get()->first()->value,
                'collation' =>  Setting::where('key','collation')->get()->first()->value,
                'prefix'    =>  '',
                'strict'    =>  false,
            ]);
    
            $external_db = DB::connection('feedback_external');
            $external_db->statement("INSERT INTO Messages (name, phone, text) VALUES ($message->name, $message->phone, $message->text);");
        }

    }

    public function viewSettings(Request $request){

        $array = Setting::all()->toArray();
        $data = [];

        foreach ($array as $setting) {
            $data[ $setting['key'] ] = $setting['value'];
            // dd($data);
        }

        return Inertia::render('Settings',[
            'title' => '??????????????????',
            'data' => $data
        ]);

    }

    public function setExportSettings(Request $request){
        $data = $request->all();

        foreach ($data as $key => $value) {

            $setting = Setting::where('key',$key);
            $setting->update(['value' => $value]);
        }

    }
}
