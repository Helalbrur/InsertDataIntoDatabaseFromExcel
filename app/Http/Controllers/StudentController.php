<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\student;

class StudentController extends Controller
{
    public function index(){
    	return view('createStudent');
    }
    public function save(Request $request){
    	if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    student::create([
                         'name' => $value->name,
                        'roll' => $value->roll,
                         'department' => $value->department
                     ]);
                   // DB::table('students')->insert($arr);
                   // dd('Insert Record successfully.');
               } 
            }
        
        // $results = \Excel::load($request->file('file'),function($reader)
        // {
        //     $reader->all();
        // })->get();

        // foreach($results as $key => $result) {
        //     student::create([
        //         'name' => $result->name,
        //         'roll' => $result->mobile,
        //         'department' => $result->address
        //     ]);
        // }

    	}
       
        return redirect('student');

    }
    public function delete(Request $request){

    		student::find($request->id)->delete();
    		
            return redirect()->back();
    }
    public function studentList(){

    		
    		return view('StudentList');
    }
}
