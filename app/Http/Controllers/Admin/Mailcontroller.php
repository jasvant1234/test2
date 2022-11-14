<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Admin\mail;
use App\Models\Admin\Thanksmail;
use Illuminate\Http\Request;

class Mailcontroller extends Controller
{

    public function mail_details()
    {
        $mail_lists = mail::all();
        return view('mail_list',compact('mail_lists'));
    }
    public function send_thanks_mail($id)
    {
        $all_send= mail::find($id);
        return view('send_mail',compact('all_send'));
    }
    public function store_mail_thanks(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'reply' => 'required',
        ]);

        $input = $request->all();
        $data = mail::find($id);
        $data['check'] = 'Yes';
        $data->update($input);
        \Illuminate\Support\Facades\Mail::to($data['email'])->send(new TestMail($data));
        return redirect()->route('mail_details')->with(['success' => 'Mail Send SuccessFully']);
    }
}
