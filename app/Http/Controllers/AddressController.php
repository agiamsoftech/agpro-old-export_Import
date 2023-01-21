<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function fetchCountries(){
        $country = DB::table("country")->orderBy('country_name', 'ASC')->get();        
        return $country;
        // dd($country);
    }
    // public function fetchStates(){
    //     $country = DB::table("country")->orderBy('country_name', 'ASC')->get();        
    //     return $country;
    //     // dd($country);
    // }
    public function fetchStates(Request $data){
        // dd($countryId=$data->country);
        $countryId=$data->country;
        $state = DB::table("state")->where('countryid','=',$countryId)->orderBy('state_name', 'ASC')->get();
        // $data=DB::select("SELECT * FROM `tbl_states` where country_id='$country' order by name");
        return $state;
    }
}
