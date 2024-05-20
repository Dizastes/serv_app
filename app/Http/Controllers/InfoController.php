<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function serverInfo() //данные об установленной версии PHP
    {
        return response()->json([
            'phpinfo' => phpversion()
        ]);
    }

    public function clientInfo(Request $request) //данные о перешедшем по роуту клиенте
    {
        return response()->json([
            'ip' => $request->ip(),
            'userAgent' => $request->userAgent() 
        ]);
    }

    public function databaseInfo() //данные об используемой базе данных
    {
        return response()->json([
            'database' => DB::connection()->getDatabaseName()
        ]);
    }
}