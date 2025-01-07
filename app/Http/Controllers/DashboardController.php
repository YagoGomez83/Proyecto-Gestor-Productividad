<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function operatorDashboard()
    {
        if (view()->exists('users.operator.dashboard')) {
            return view('users.operator.dashboard');
        }
        return response('Vista no encontrada', 404);
    }

    public function managementDashboard()
    {
        if (view()->exists('users.management.dashboard')) {
            return view('users.management.dashboard');
        }
        return response('Vista no encontrada', 404);
    }
}
