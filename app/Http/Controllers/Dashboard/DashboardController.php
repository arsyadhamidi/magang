<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Perizinan;
use App\Models\Perusahan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        return view('dashboard.home.index');
    }
}
