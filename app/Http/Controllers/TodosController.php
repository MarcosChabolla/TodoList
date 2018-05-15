<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){		//Grabs all the entries in the Todo Table
    	$todos = Todo::all();
    	return view('todos')->with('todos', $todos);
    }

    public function store(Request $request){
    	// dd($request->all());
    	$todo = new Todo;		//New row in DB

    	$todo->todo = $request->todo;
    	$todo->save();

    	Session::flash('success', 'Your todo was created.');
    	return redirect()->back();
    }

    public function delete($id){
    	$todo = Todo::find($id);		//Finds ID in DB
    	$todo->delete();				//Deletes the row in DB

    	Session::flash('success', 'Your todo was deleted.');
    	return redirect()->back();	
    }

    public function update($id){
    	$todo = Todo::find($id);		//Finds ID in DB
    	Session::flash('success', 'Your todo was updated.');
    	return view('update')->with('todo', $todo);

    	// $todo->update();				//update the row in DB
    	// return redirect()->back();	
    }

    public function save(Request $request, $id){
    	$todo = Todo::find($id);
    	$todo->todo = $request->todo;
    	$todo->save();

    	return redirect()->route('todos');
    }

    public function completed($id){
    	$todo = Todo::find($id);
    	$todo->completed = 1;
    	Session::flash('success', 'Your todo was completed.');
    	$todo->save();

    	return redirect()->back();
    }
}
