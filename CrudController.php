<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

use Session;

class CrudController extends Controller
{
    

        public function showData(){
            $showData = Crud::all();
            return view('show_data', compact('showData'));
        }


        public function addData(){
            return view('add_data');
        }

        public function storeData(Request $request){
            $rules=[
                'name'=> 'required|max:10',
                'email'=> 'required|email',
            ];

            $cm=[
                'name.required'=> 'Enter your name',
                'name.max'=> 'Your name can not contain more than 10 ch',
                'email.required'=> 'Enter your email',
                'email.email'=> 'Email must be a valid email',
            ];
            $this-> validate($request, $rules);

            $crud=new Crud();
            $crud->name=$request->name;
            $crud->email=$request->email;
            
            Session::flash('msg', 'Data successfully Added');
            return redirect()-> back();
        }

}
