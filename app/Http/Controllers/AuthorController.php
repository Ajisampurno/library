<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.authors.index');
    }

    public function api()
    {
        $authors = Author::all();
        $datatables = datatables()->of($authors)->addIndexColumn();

        return $datatables->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);

        Author::create($request->all());
        return Redirect('authors');
    }

    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);

        $author->update($request->all());
        return Redirect('authors');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return true;
    }
}
