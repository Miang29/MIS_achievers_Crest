<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menuPage() {
        return view('admin.home.menu');
    }

    function dashboardPage() {
        return view('admin.home.dashboard');
    }

    function clientPage() {
        return view('admin.home.registration.client');
    }

    function petPage() {
        return view('admin.home.registration.pet');
    }

    function consultPage() {
        return view('admin.home.services.consultation');
    }

    function vaccinePage() {
        return view('admin.home.services.vaccination');
    }

    function stocksPage() {
        return view('admin.home.services.stocks');
    }
}

