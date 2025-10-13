<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersDataExports;
use Maatwebsite\Excel\Facades\Excel;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);
        return view('admin.dashboard', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersDataExports, 'users.xlsx');
    }
}
