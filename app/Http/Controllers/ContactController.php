<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact=Contact::all()->toArray();
        return array_reverse($contact);
    }
}
