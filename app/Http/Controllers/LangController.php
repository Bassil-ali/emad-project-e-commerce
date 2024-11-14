<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{

public function switchLanguage(Request $request, $lang)
{
    app()->setLocale($lang);
    session(['applocale' => $lang]);
    return redirect()->back();
}
}
