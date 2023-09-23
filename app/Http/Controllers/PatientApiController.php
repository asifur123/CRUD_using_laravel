<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class PatientApiController extends Controller
{
    public function showApiData(){
        $showApiData = Crud::all();
        return response()->json($showApiData);
    }

    public function addApiData(){
        return response()->json();
    }

    public function storeAPiData(Request $request){

        $rules=[

            'name'=>'required|max:30',
            'email'=>'required|max:40',
            'phone'=>'required|max:14',
            'address'=>'required|max:100',
        ];
        $cm = [
            'name.required' => 'Enter Your Name',
            'name.max' => 'Your Name can not contain more than 30 characters',
            'email.required' => 'Enter Your Email',
            'email.max' => 'Your Email can not contain more than 40 characters',
            'email.email'=>'Email must be a valid email',
            'phone.max' => 'Your Phone can not contain more than 14 characters',
            'address.max' => 'Your Address can not contain more than 100 characters',
            
        ];
        $this->validate($request,$rules,$cm);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->phone = $request->phone;
        $crud->address = $request->address;
        $crud->save();
        return response()->json(["msg" => "Success", "data" => $crud]);

        // return redirect('/');


    }

    public function editApiData($id=null){
        $editData= Crud::find($id);
        return response()->json(["msg" => "Success", "data" => $editData]);
    }

    public function updateApiData(Request $request, $id){

        $rules=[

            'name'=>'required|max:30',
            'email'=>'required|max:40',
            'phone'=>'required|max:14',
            'address'=>'required|max:100',
        ];
        $cm = [
            'name.required' => 'Enter Your Name',
            'name.max' => 'Your Name can not contain more than 30 characters',
            'email.required' => 'Enter Your Email',
            'email.max' => 'Your Email can not contain more than 40 characters',
            'email.email'=>'Email must be a valid email',
            'phone.max' => 'Your Phone can not contain more than 14 characters',
            'address.max' => 'Your Address can not contain more than 100 characters',
            
        ];
        $this->validate($request,$rules,$cm);

        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->phone = $request->phone;
        $crud->address = $request->address;
        $crud->save();
        \Illuminate\Support\Facades\Session::flash('msg','Data Successfully Updated');

        return response()->json(["msg" => "Success", "data" => $crud]);


    }

    public function deleteApiData($id=null){

        $deleteData = Crud::find($id);
        $deleteData->delete();
        \Illuminate\Support\Facades\Session::flash('msg','Data Successfully Deleted');

        return response()->json(["msg" => "Success", "data" => $deleteData]);

    }
}
