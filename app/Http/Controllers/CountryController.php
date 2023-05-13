<?php

namespace App\Http\Controllers;

Use Exception;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CountryModel;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);
    }

    public function countryByID($id){
        $country = CountryModel::find($id);
        if (!is_null($country)) {
            return response()->json(['msg'=> 'Find success.', 'data' => $country], 200);
        } else {
            return response()->json(['msg' => 'ID not found!'], 400);
        }
    }

    public function countrySave(Request $request){
        if(!is_null($request)) {
            try {
                $country = CountryModel::create($request->all());
                return response()->json(['msg'=> 'Inserted success.', 'data' => $country], 201);
            } catch(\Throwable $e) {
                return response()->json(['msg' => 'Error: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['msg' => 'No have input datas!'], 400);
        }
    }

    public function countryUpdate(Request $request, $id){
        
        $country = CountryModel::find($id);

        if(!is_null($country)) {
            try {
                $country->update($request->all());
                return response()->json(['msg'=> 'Update success.', 'data' => $country], 201);
            } catch(\Throwable $e) {
                return response()->json(['msg' => 'Error: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['msg' => 'No have input datas!'], 400);
        }
    }

    public function countryDelete(Request $request, $id){
        $country = CountryModel::find($id);
        if (!is_null($country)) {
            try{
                CountryModel::find($id)->delete();
                return response()->json(['msg' => 'Deleted is success.'], 200);
            } catch(\Throwable $e) {
                return response()->json(['msg' => 'Delete error: ' . $e->getMessage()]);
            }
        } else {
            return response()->json(['msg' => 'ID not found!']);
        }
    }
}