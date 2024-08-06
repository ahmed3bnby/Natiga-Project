<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return redirect()->back()->with('error', 'No data sent for search.');
        }

        /* if i want to search with a name or number ( like ) the number 

        $students = Student::where('name', 'LIKE', "%$query%")
                           ->orWhere('number', 'LIKE', "%$query%") 
                           ->get();

                           */

                          $students = Student::where('name', $query) // must type the number or name correctly.
                          ->orWhere('number', $query)
                          ->get();


        if ($students->isEmpty()) {
            return view('students.index')->with('error', 'No students found matching the query.');
        }

        return view('students.index', compact('students'));
    }

    public function showImportForm()
    {
        return view('students.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        if (!$request->hasFile('file')) {
            return redirect()->back()->with('error', 'No file was uploaded.');
        }

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect('/')->with('success', 'Students imported successfully.');
    }
}
