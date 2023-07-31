<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class MessageController extends Controller
{
    public function index(){
        $messages = Contact::all();
        return view('back.message.index',compact('messages'));
    }

    public function delete($id){
        $message = Contact::find($id);

        $message->delete();
        toastr()->success('Mesaj uğurla silindi!', 'Uğurlu!');

        return redirect()->back();
    }
}
