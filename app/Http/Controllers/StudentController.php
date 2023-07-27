<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function  index(){
        return view('student-data-excel', [
            'students' => Students::all()
        ]);
    }

    public function import(Request $request){
        $this->validate($request, [
            'studentFile' => 'mimes:xls,xlsx,csv',
        ]);

        $file= $request->file('studentFile')->store('public/import');

        $import = new StudentImport;
        $import->import($file);

        // dd($import->failures());

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures())->with('failed', 'There is some errors in certain row. Please check the table below for details');
        }
        
        return redirect('/')->with('success', 'Data successfully imported');
        
        
    }

    public function downloadStudentTemplate(){
        try{
            $studentTemplate = public_path('download/file/Student_Template.xlsx');
            return response()->download($studentTemplate);
        }catch(\Exception $e){
            abort(404);
        }
    }
}
