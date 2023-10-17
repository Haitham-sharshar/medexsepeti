<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomController extends Controller
{


    public function getView($view,$action = null)
    {
        return view($view,$action);
    }

}
