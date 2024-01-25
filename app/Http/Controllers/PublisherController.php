<?php

namespace App\Http\Controllers;

use App\Models\Publisher;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);

        Publisher::create($request->all());
        return Redirect('publishers');
    }

    public function edit(Publisher $publisher)
    {
        return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $this->validate($request, [
            'name' => ['required']
        ]);
        $publisher->update($request->all());
        return Redirect('publishers');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return Redirect('publishers');
    }
}
