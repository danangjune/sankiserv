<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Jika Anda ingin mengambil data dari tabel posts

class DashboardController extends Controller
{
    public function index()
    {
        // $posts = Post::all(); // Ambil data dari tabel posts
        // return view('admin.dashboard', compact('posts'));
        return view('admin.dashboard');
    }
}

