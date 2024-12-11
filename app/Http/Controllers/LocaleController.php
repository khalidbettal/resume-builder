<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocaleController extends Controller
{
    public function localeSwitch($lang) 
    {
        if (array_key_exists($lang, LaravelLocalization::getSupportedLocales())) {
            // dd($lang);
            LaravelLocalization::setLocale($lang);
    
        // App::setLocale($lang);
        Session::put('locale', $lang);
        }
    
        return redirect()->back();
         
    }

        
    }

