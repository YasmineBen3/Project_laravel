<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->Doctor()) {
            return view('doctors');
        } elseif ($user->Patient()) {
            return view('patients');
        } else {
            return view('dashboard.index');
        }
    }
}
