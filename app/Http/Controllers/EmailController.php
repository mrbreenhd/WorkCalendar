<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roster;
use Carbon\Carbon;
use App\User;
use Email;

class EmailController extends Controller
{
    public function lastedited($id) {
        $date  = Carbon::now()->subMinutes(10);
        $date->setTimezone('Europe/Dublin');

        $user = User::find($id);


        $rosteredits = Roster::where('updated_at', '>=', $date)->get();

        return view('admin.email.lastedited', compact('rosteredits', 'user'));

    }
}