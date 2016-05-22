<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;

use App\todo;

use Session;

use Request;

use Illuminate\Support\Facades\Input;


class pagescontroller extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Request::ajax())
        {
        // todo::create(Request::all());
            $todo=new todo;
            $todo->title=Input::get('title');
            $todo->save();



        // return view("pages.new_data",$todo);
        
        // $todo=$request->id;
        // $todos=todo::whereId($todo)->get();
        // $returnpage= view("pages.show_all")->with("todos",$todos);
        

        //Session::flash('flash_message', 'Task successfully added!');
       //$this->validate($request, ['todo_name' => 'required']);
         
        }

    }

    public function getAllTodos(){

         $show_data=todo::all();
         echo json_encode($show_data);

         // $a=Array('a'=>'name');
         // echo json_encode($a);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update=todo::find($id);
        $input=$request->all();
        $update->title->$input->title;
        $update->save();
        return "success";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function state(Request $request, $id)
    {
        if(Request::ajax()){
        $update=todo::find($id);
        $input = $request->all();
        $update->state = isset($input["state"])?$input["state"]:0;
        $update->save();
        return $update->state;
        }
        // echo $request->state;
        // echo $request;
        // echo "<pre>";echo( isset($input["state"]));
        // return redirect("/show_all");
         // $responseText=array();
         //  $responseText['status']="success";
         //    echo json_encode($responseText);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $delete=todo::find($id);
            $send_id=$delete->id;
            $delete->delete();
            $json=Array('status'=>'ok','message'=>'Deleted successfully');
            echo (json_encode($json));
            // return ("OK",$send_id);
    }

    public function show_all()
    {
        $show_data=todo::all();
        return view("pages.show_all",compact("show_data"));
    }

    public function show_active()
    {
        $show_data=todo::all();
    }
    public function show_completed()
    {

    }

}

