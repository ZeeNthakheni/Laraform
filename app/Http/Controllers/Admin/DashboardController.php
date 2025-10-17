<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\submissions;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $totalSubmissions = submissions::count();
        $totalUsers = User::count();
        $recentSubmissions = submissions::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalSubmissions', 'totalUsers', 'recentSubmissions'));
    }
}
