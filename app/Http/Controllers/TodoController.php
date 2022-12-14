<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Traits\TodoPriority;

class TodoController extends Controller
{
    use TodoPriority;

    public function __construct() {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todo::all();
        return view('todo.index')->with('todo', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //validate first
        $request->validate([
            'title' => 'required|min:1|max:100',
            'description' => 'max:250',
            'priority' =>  'numeric|min:0|max:1',
        ]);
        
        Todo::create($input);
        return redirect('todo')->with('flash_message', 'List was added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        $p = $this->checkListPriority($todo['priority']);
        $todo['badge'] = [$p];
        return view('todo.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $input = $request->all();
        //validate first
        $request->validate([
            'title' => 'required|min:1|max:100',
            'description' => 'max:250',
            'priority' =>  'numeric|min:0|max:1',
        ]);
        
        $todo->update($input);
        return redirect('todo')->with('flash_message', 'List was updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('todo')->with('flash_message', 'List was deleted!');
    }
}
