<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkademikController extends Controller
{
    //

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;
        // $ipk = Mahasiswa::where('email', $user->email)->first()->ipk;
        // $semester_berjalan = Mahasiswa::where('email', $user->email)->first()->semester_berjalan;

        $data = [
            'userName' => $userName,
            'status' => $status,
        ];

        // Pass the user data to a view, or return a response
        return view('mhsAkademik', compact('data'));
    }
}
