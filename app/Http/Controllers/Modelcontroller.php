<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;

class Modelcontroller extends Controller
{

    public function get_data($api, $item = null)
    {
        if ($api == 'users') {
            $japi = People::get();
            return response()->json($japi, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        } else {
            $japi = People::where('id', $api)->orWhere("name", $api)->orWhere("surname", $api)->orWhere("age", $api);
    
            if ($item == 'id') {
                $japi = $japi->select('id')->first();
            }
            else if($item == 'name'){
                $japi = $japi->select('name')->first();
            }
            else if($item == 'surname'){
                $japi = $japi->select('surname')->first();
            }
            else if($item == 'age'){
                $japi = $japi->select('age')->first();
            }
            else if($item == 'created_at'){
                $japi = $japi->select('created_at')->first();
            }
            else if($item == 'updated_at'){
                $japi = $japi->select('updated_at')->first();
            }
            else {
                $japi = $japi->first();
            }
    
            if (!$japi) {
                return response()->json(["error" => 'API not found'], 404);
            }
    
            return response()->json($japi, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }
    
    



    public function data_list(){
        return response()->json(People::get() ,200 ,[] , JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); 
    }
    

    public function create_data(){
        People::create([
            "name" => "Arda",
            "surname" => "Ayhan",
            "age" => "18",
        ]);
    }
    public function update(){
        People::whereId(7)->update([

        ]);
    }
    
}
