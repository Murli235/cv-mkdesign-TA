<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Project;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $projects = Project::all();
        $testimonis = Testimoni::all();
        if (Auth::user()->role != 'User') {
            $pemesanans = Pemesanan::all();
        } else {
            $pemesanans = Pemesanan::where('user_id', Auth::user()->id);
        }
        $type_menu = 'Home';
        return view('pages.home.home-index', compact('type_menu', 'users', 'projects', 'testimonis', 'pemesanans'));
    }
}
