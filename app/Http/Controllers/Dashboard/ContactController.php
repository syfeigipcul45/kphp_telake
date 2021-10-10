<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $data['contacts'] = Contact::all();
        return view('dashboard.contacts.index', $data);
    }

    public function show($id) {
        $data['contacts'] = Contact::where('id', $id)->first();
        return view('dashboard.contacts.show', $data);
    }
}
