<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index(){
        return view('crud');
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

       Student::insert([
           'name' => $request->name,   
           'roll' => $request->roll,   
           'class' => $request->class,   
       ]);

       return redirect()->back()->with('success','Data Added Successfully');
    }
}
