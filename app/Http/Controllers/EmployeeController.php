<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editedCompanies = array();
        $companies = Company::all();
        foreach($companies as $company) {
            $editedCompanies[$company->id] = $company;
        }
        $employees = Employee::latest()->paginate(10);
        return view('employees.layouts.list', compact('employees'))->with(compact('editedCompanies'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.layouts.create', compact('companies', $companies));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'company'=>'required',
            'email'=> 'required|unique:employees',
            'phone'=> 'regex:/(01)[0-9]{9}/'
        ]);

        $employee = new Employee([
            'f_name' => $request->get('f_name'),
            'l_name'=> $request->get('l_name'),
            'company'=> $request->get('company'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone')
        ]);

        $employee->save();

        return redirect('/employees')->with('success', 'Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $company = Company::find($employee->company);
        return view('employees.layouts.view',compact('employee'))->with(compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.layouts.edit',compact('employee'))->with(compact('companies', $companies));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            // 'company'=>'exists:companies,id,' . $request->get('company'),
            // 'email'=> 'required|unique:employees',
            // 'phone'=> 'regex:/(01)[0-9]{9}/'
        ]);


        $employee = Employee::find($id);
        $employee->f_name = $request->get('f_name');
        $employee->l_name = $request->get('l_name');
        $employee->company = $request->get('company');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');

        $employee->update();

        return redirect('/employees')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect('/employees')->with('success', 'Company deleted successfully');
    }
}
