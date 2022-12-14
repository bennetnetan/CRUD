<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        $arr['emp'] = $employee::paginate(5);
        // dd($arr['emp']);
        // return view('home')->with($arr);

        // $emp = Employee::paginate(5);

        // return view('home', ['emp' => $emp]);
        return view('home')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $employee->fname = $request->firstname;
        $employee->lname = $request->lastname;
        $employee->idnum = $request->idNumber;
        $employee->email = $request->email;
        $employee->office = $request->ofisi;

        // dd($employee);
        $employee->save();
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $emp = Employee::findOrFail($id);
        // $arr['emp'] = $emp;
        // $arr['id'] = $id;
        // return view('employees.edit')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $emp = Employee::findOrFail($id);
        $arr['emp'] = $emp;
        $arr['id'] = $id;
        // return view('edit')->with($arr);
        return view('employees.show')->with($arr);
        // dd($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $idn = $request->idn;

        $employee = Employee::findOrFail($idn);

        $employee->fname = $request->firstname;
        $employee->lname = $request->lastname;
        $employee->idnum = $request->idNumber;
        $employee->email = $request->email;
        $employee->office = $request->ofisi;


        $employee->save();
        return redirect(route('home'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();

        return response()->json(['success'=>'User deleted successfully']);
    }
}
