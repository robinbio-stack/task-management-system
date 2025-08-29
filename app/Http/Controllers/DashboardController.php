<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pass user to the dashboard view
        return view('dashboard.index', compact('user'));
    }
}
