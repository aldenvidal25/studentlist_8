<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;

class StudentController extends Controller
{

    public function index()
    {

        $data = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(10));

        return view('students.index', $data);
    }

    //index for admin only
    public function admin_index()
    {

        $data1 = array("students" => DB::table('students')->orderBy('created_at', 'desc')->simplePaginate(10));

        return view('user.index', $data1);
    }

    public function admin_dashboard()
    {
        $data2 = array("users" => DB::table('users')->orderBy('created_at', 'desc')->simplePaginate(10));
        return view('user.index', $data2);
    }

    public function show($id)
    {
        $data = Students::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    public function show_user($id)
    {
        $data3 = User::findOrFail($id);
        return view('user.edit', ['student' => $data3]);
    }

    public function create()
    {
        return view('students.create')->with('title', 'Add New');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('students', 'email')],
        ]);

        Students::create($validated);

        return redirect('/')->with('message', 'New Student was added successfully!');
    }

    public function update(Request $request, Students $student)
    {
        // dd($request);
        $validated = $request->validate([
            "first_name" => ['required', 'min:2'],
            "last_name" => ['required', 'min:2'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],
        ]);

        $student->update($validated);

        return back()->with('message', 'Data was successfully updated');
    }

    public function destroy(Students $student)
    {
        $student->delete();
        return redirect('/')->with('message', 'Data was successfully deleted');
    }
}
