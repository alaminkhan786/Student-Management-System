<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_student()
    {
        return view('student.create_student'); 
    }
    public function store_student(Request $request){
        try{
            $data_insert = Student::create([
                'name' => $request->name,
                'roll' => $request->roll,
                'age' => $request->age,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'district' => $request->district,
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->route('create.student')->with('success', "Student Add Sucessfully");
        }
        catch(\Exception $e) {
          return redirect()->route('create.student')->with('fail', "Student Add Failed"); 
        }
        
    }
    public function student_list(){
        $students = Student::all();
        return view('student.student_list',compact('students'));
    }
    public function student_edit($id){
        $student = Student::find($id);
        return view('student.student_edit', compact('student','id'));
    }

    public function student_update(Request $request, $id){
        try{
            $data = Student::find($id);
            $data->name = $request->name;
            $data->roll = $request->roll;
            $data->age = $request->age;
            $data->gender = $request->gender;
            $data->phone = $request->phone;
            $data->district = $request->district;
            $data->updated_by = Auth::user()->id;
            $data->save();
            
            return redirect()->route('student.edit',$id)->with('success', "Student Update Sucessfully");
        }
        catch(\Exception $e) {
          return redirect()->route('student.edit',$id)->with('fail', "Student Update Failed"); 
        }
    }
    public function student_delete($id){
        try{
            $data = Student::find($id);
        
            $data->delete();
            
            return redirect()->route('student.list')->with('success', "Student Delete Sucessfully");
        }
        catch(\Exception $e) {
          return redirect()->route('student.list',$id)->with('fail', "Student Delete Failed"); 
        }
    }

    
}