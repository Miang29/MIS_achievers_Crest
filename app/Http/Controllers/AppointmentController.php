<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;

class AppointmentController extends Controller
{
    protected function index()
    {
        return view('admin.appointment.index');
    }

    protected function create()
    {
        return view('admin.appointment.create');
    }

    protected function edit($id)
    {
        // $appointment = Appointment::find($id);
        return view('admin.appointment.edit', [
            // 'appointment' => $appointment
            // 'appointment' => Appointment::find($id)
            'appointment' => collect([
                'owner' => 'Tukmol',
                'email' => 'tukmolito@tukmol.com',
                'pet' => 'Multo',
                'appointment_schedule' => Carbon::now()->timezone('Asia/Manila')
            ])
        ]);
    }

    protected function show($id)
    {
        return view('admin.appointment.show', [
            'appointment' => [
                'owner' => 'Tukmol',
                'email' => 'tukmolito@tukmol.com',
                'pet' => 'Multo',
                'appointment_schedule' => Carbon::now()->timezone('Asia/Manila')
            ]
        ]);
    }
}