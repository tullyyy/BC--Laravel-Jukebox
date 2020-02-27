<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    // list author objects that are in the database
    public function index()
    {
    $authors = Author::all();
    $authors = Author::orderBy('id', 'desc')->get();

    return view('admin/author/index', compact('authors'));
    }

    // Display the form used to create a new author
    public function create()
    {
        $author = new Author;

        // create view object  representing resources/views/admin/author/edit.blade.php
        // compact('author') is the same as an array === ['author' => $author]
        $view = view('admin/author/edit', compact('author'));

        // return the view object, rendering it. 
        return $view;
    }

    // purpose of store is to insert the new author object into the database
    public function store(Request $request)
    {
 
        $this->validate($request, [
            'name' => 'required',
        ]);

    // create a new object Author 

    $author = new Author;

    //fill the new object from the request
    //$request = request(); another way of getting the Request object
    $author->name = $request->input('name');

    //store the filled object into the database into the table 'authors'
    $author->save();

    session()->flash('success_message', 'Success!');

    //redirect somewhere
    return redirect('author/'.$author->id.'/edit');
    }

    public function edit($id)
    {
    $author = Author::findOrFail($id);

    return view('admin/author/edit', compact('author'));
    }


    // its purpose is to update an existing record in the database
    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        // select an existing object Author from the Database
        $author = Author::findOrFail($id);

        //fill the new object from the request
        //$request = request(); another way of getting the Request object
        $author->name = $request->input('name');
    
        //store the filled object into the database into the table 'authors'
        $author->save();

        session()->flash('success_message', 'Success!');


        return redirect(action('AuthorController@edit', ['id' => $author->id])); //better way
        // return redirect('author/'.$author->id.'/edit');
        // manual way, you have to keep track of changes
    }


    // deleted an existing author from the database
    public function delete($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        session()->flash('success_message', 'Successfully deleted!');

        return redirect()->action('AuthorController@index');
    }
}
