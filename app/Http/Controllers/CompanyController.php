<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $companies = Company::latest()->paginate(10);
        return view('companies.layouts.list', compact('companies','companies'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.layouts.create');
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
            'name'=>'required',
            'email'=> 'required|unique:companies',
            'logo' => 'required|dimensions:min_width=100,min_height=100'
        ]);

        $image = $request->file('logo');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $path = $request->file('logo')->storeAs('/', $filename, 'public');

        $company = new Company([
            'name' => $request->get('name'),
            'email'=> $request->get('email'),
            'logo'=> $path,
            'website'=> $request->get('website')
        ]);

        $company->save();

        $data['title'] = 'New Company added';    
        $data['body'] = $company->name.' added to your system';    
        Mail::send('emails.newCompanyMail', $data, function ($message) {
            $message->from('example@laravel.com', 'Codersea Laravel Project');
            $message->to('muhamad.atout@gmail.com')->subject('New Company');
        });

        return redirect('/companies')->with('success', 'Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return view('companies.layouts.view',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('companies.layouts.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:100'
        ]);


        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->email = $request->get('email');
        $company->logo = $request->get('logo');
        $company->website = $request->get('website');

        $company->update();

        return redirect('/companies')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();
        return redirect('/companies')->with('success', 'Company deleted successfully');
    }
}
