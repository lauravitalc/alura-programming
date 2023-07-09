<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $request->get(key:'id');
        $series = [
            'The Boys',
            'Supernatural',
            'Peaky Blinders'
        ];

        $html = '<ul>';
        foreach ($series as $serie){
            $html .= "<li>$serie</li>";
        }
        $html .= '</ul>';

        return $html;
    }
}
