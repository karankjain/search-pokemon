<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon; // pokemon model
use DB; // database

class JsonController extends Controller
{
    public function index() {
        return view('pages.json');
    }

    public function jsonToDb(Request $request) {
        //validate file path to see if it is JSON file and if it is then it has data and not empty
        $file_extension = substr(strrchr($request->path,'.'),1);
        if (strtolower($file_extension) == 'json'){
            DB::table('pokemon')->truncate();

            $json_data = json_decode(file_get_contents($request->path), true);
            if (count($json_data) > 0) {
                try{
                    foreach ($json_data as $key => $value) {
                        foreach ($value['types'] as $types){
                            DB::table('pokemon')->insert(
                                ['name' => ucwords($value['name']), 'types' => $types]
                            );
                        }
                    }
                    return redirect('/loadjson')->with('success','File Uploaded Successfully');
                }
                catch (\Exception $e) {
                    return redirect('/loadjson')->with('error','Something went wrong');
                }
            }
            else {
                return redirect('/loadjson')->with('error','Your Json file is empty');
            }
        }
        else {
            return redirect('/loadjson')->with('error','Invalid Path');
        }
        
    }
}
