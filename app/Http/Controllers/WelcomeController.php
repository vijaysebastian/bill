<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Common\Country;

class WelcomeController extends Controller
{
    private $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getCode(){
        $country = new Country();
        $country_iso2 = $this->request->get('country_id');
        $model = $country->where('country_code_char2',$country_iso2)->select('phonecode')->first();
        return $model->phonecode;
    }
    public function getCurrency(){
        $currency = "INR";
        $country_iso2 = $this->request->get('country_id');
        if($country_iso2!="IN"){
            $currency = "USD";
        }
        return $currency;
        
    }
}
