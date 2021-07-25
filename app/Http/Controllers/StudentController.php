<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('crud',compact('students'));
    }

    //--------Store data-------------

    public function store(Request $request){
       $request->validate([
          'name' => 'required',
          'roll' => 'required',
          'class' => 'required',
       ],[
          'name.required' => 'Please Input Your Name',
          'roll.required' => 'Please Input Your Roll',
          'class.required' => 'Please Input Your Class',
       ]);

    //--------insert data------------

       Student::insert([
           'name' => $request->name,   
           'roll' => $request->roll,   
           'class' => $request->class,   
       ]);

       return redirect()->back()->with('success','Data Added Successfully');
    }

    //-------student edit----------- 

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('edit',compact('student'));
    }
    
    //-------student update-----------

    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
         ],[
            'name.required' => 'Please Input Your Name',
            'roll.required' => 'Please Input Your Roll',
            'class.required' => 'Please Input Your Class',
         ]);
  

         Student::findOrFail($id)->update([
             'name' => $request->name,   
             'roll' => $request->roll,   
             'class' => $request->class,   
         ]);
  
         return redirect()->to('/crud')->with('update','Data Updated Successfully');
      }

    
}
