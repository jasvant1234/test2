<?php

namespace App\Http\Controllers;

use App\Mail\UserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::select("*")->paginate(5);

        return view('User.users', compact('users'));
    }

    public function sendEmail(Request $request)
    {
        $users = User::whereIn("id", $request->ids)->get();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new UserEmail($user));
        }
        return response()->json(['success'=>'Send email successfully.']);
    }
}
