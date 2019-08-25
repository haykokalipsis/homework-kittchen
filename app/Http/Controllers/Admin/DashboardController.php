<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.dashboard.index', compact('categories'));
    }
}
