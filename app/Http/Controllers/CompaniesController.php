<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Http\Requests\CompaniesFormRequest;
use Storage;



class CompaniesController extends Controller
{

    //Show company
    public function index()
    {
        $Companies = Companies::orderBy('id', 'desc')->paginate(3);
        return view('companies',compact('Companies'));
    }


    //Add company
    public function create()
    {
        return view('companies-add');
    }

    public function createData(CompaniesFormRequest $request)
    {
        $validateData = $request->validated();

        $companies = new Companies;
        $companies->name = $validateData['name'];
        $companies->email = $validateData['email'];
        $companies->website = $validateData['website'];

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->storeAs('public/company', $filename);
            $companies->logo = $filename;
        }

        $companies->save();

        return redirect('companies')->with('message', 'Company Added Successfully');

    }


    // edit company
    public function edit($CompanyId)
    {
        $Company = Companies::findOrFail($CompanyId);

        return view('companies-edit', compact('Company'));
    }


    public function update(CompaniesFormRequest $request, $CompanyId)
    {

        $validateData = $request->validated();

        $companies = Companies::findOrFail($CompanyId);

        $companies->name = $validateData['name'];
        $companies->email = $validateData['email'];
        $companies->website = $validateData['website'];

        if($request->hasFile('logo')){

            if (Storage::exists('public/company/'.$companies->logo)) {
                Storage::delete('public/company/'.$companies->logo);
            }

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->storeAs('public/company', $filename);
            $companies->logo = $filename;
        }

       $companies->update();

        return redirect('companies')->with('message', 'Company Updated Successfully');

    }


    //delete company
    public function destroy($CompanyId){
        $Company = Companies::findOrFail($CompanyId);

        if (Storage::exists('public/company/'.$Company->logo)) {
            Storage::delete('public/company/'.$Company->logo);
        }

        $Company->delete();
        return redirect('companies')->with('message','Company Deleted Successfully');
    }



}
