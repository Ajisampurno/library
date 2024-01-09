<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('admin.publisher.index');
    }
}
