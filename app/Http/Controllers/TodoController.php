<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;

use Input;
use App\Http\Requests;
use App\Task;


class TodoController extends Controller
{
    public function index(){
    	$data = Task::all();
    	return view('home')->with('data',$data);
    }

    public function store(CreateTaskRequest $requests){
    	$data= [
    			'name'=>Input::get('name'),
    			'status'=>'incomplete'
    			];
    	$response=Task::create($data);
    	if($response)
    		return redirect()->back()->with('success','Task Created Successfully');
    }

    public function edit($id) {
    	$data = Task::find($id);
    	return view('todo-edit')->with('data',$data);	
    }

    public function update(CreateTaskRequest $requests,$id) {
        $data= [
                'name'=>Input::get('name'),
                'status'=>Input::get('status')
                ];
        $response=Task::find($id)->update($data);
        if($response)
            return redirect('/');

    }

    public function delete($id) {
        $response = Task::find($id)->delete();
        return redirect('/')->with('success','Task Delete Successfully');
    }
}
