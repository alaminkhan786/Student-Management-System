<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\education;

class EducationControlller extends Controller
{
    public function education()
    {
        return view('education.education');
    }
    public function store_education(Request $request)
    {
        try {
            $data_insert = education::create([
                'degreeName' => $request->degreeName,
                'institute' => $request->institute,
                'passingYear' => $request->passingYear,
                'studentID' => $request->studentID,
            ]);
            return redirect()->route('store.education')->with('success', "Student Add Sucessfully");
        } catch (\Exception $e) {
            return redirect()->route('store.education')->with('fail', "Student Add Failed");
        }
    }
    public function education_list()
    {
        $education = education::all();
        return view('education.education', compact('education'));
    }
    public function education_edit($id){
        $education = education::find($id);
        return view('education.education-edit', compact('education','id'));
    }
    public function education_update(Request $request, $id)
    {
        try {
            $data = education::find($id);
            $data->degreeName = $request->degreeName;
            $data->institute = $request->institute;
            $data->passingYear = $request->passingYear;
            $data->studentID = $request->studentID;
            $data->save();

            return redirect()->route('store.education')->with('success', "education Update Sucessfully");
        } catch (\Exception $e) {
            return redirect()->route('store.education')->with('fail', "education Update Failed");
        }
    }
    public function education_delete($id){
        try{
            $data = education::find($id);
        
            $data->delete();
            
            return redirect()->route('education.list')->with('success', "education Delete Sucessfully");
        }
        catch(\Exception $e) {
          return redirect()->route('education.list',$id)->with('fail', "education Delete Failed"); 
        }
    }
}