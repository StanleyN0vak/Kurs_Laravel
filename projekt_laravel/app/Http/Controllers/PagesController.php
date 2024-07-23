<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact(){
        $header = 'To jest nagłówek strony kontakt';
        $date = '20/02/2024';
        $visited = 3450;
        return view('pages.contact', compact('header', 'date', 'visited'));
    }

    public function about(){
        return view('pages.about');
    }
}
