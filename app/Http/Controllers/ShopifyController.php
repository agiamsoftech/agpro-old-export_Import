<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    public function shopify()
    {        
        return view('shopify'); 
    }
}
