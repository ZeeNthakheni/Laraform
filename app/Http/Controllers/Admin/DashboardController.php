<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\submissions;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalSubmissions = submissions::count();
        $recentSubmissions = submissions::orderBy('created_at', 'desc')->limit(5)->get();
        $recentUsers = User::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalSubmissions', 'recentSubmissions', 'recentUsers'));
    }
}
