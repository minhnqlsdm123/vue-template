<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){

        $searchValue = $request->input('search');
        $query = Contact::select('id','web', 'email', 'phone', 'addr')->get();;

        if ($searchValue) {
            $query->where(function ($query) use ($searchValue) {
               $query->where('web', 'like', '%'.$searchValue.'%')
                     ->orWhere('email', 'like', '%'.$searchValue.'%')
                     ->orWhere('phone', 'like', '%'.$searchValue.'%')
                     ->orWhere('addr', 'like', '%'.$searchValue.'%');
            });
        }
        return $query;
    }
}
