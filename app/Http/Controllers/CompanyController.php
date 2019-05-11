<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function __construct()
    {
        // ->except(['index']) can view index but cannot edit delete add
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(5);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company = new Company();
        return view('company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $company = Company::create($this->validateRequest());
        // store logo
        $this->storeLogo($company);
        return redirect('companies')->with('message', 'Company has Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        $company->update($this->validateRequest());
        // store logo
        $this->storeLogo($company);
        return redirect('companies/' . $company->id)->with('message', 'Details has Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        // delete logo
        File::delete(public_path('storage/' . $company->logo));
        return redirect('companies')->with('message', 'Details has Deleted');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => '',
            'logo' => 'sometimes|file|image|max:5000'
        ]);
    }

    public function storeLogo($company)
    {
        if (request()->has('logo')) {
            $company->update([
                // store('uploads', 'public') = path folder upload
                'logo' => request()->logo->store('logo', 'public')
            ]);

            // sizing image
            $logo = Image::make(public_path('storage/' . $company->logo))->fit(200, 200);
            $logo->save();
        }
    }
}
