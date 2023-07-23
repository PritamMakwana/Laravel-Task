<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesFormRequest;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\Companies;
use Storage;

class EmployeesController extends Controller
{

    //Show
    public function index(){
        $employees = Employees::orderBy('id', 'desc')->paginate(3);
        return view('employees',compact('employees'));
    }


     //Add employees
     public function create()
     {
         $Company = Companies::all();
         return view('employees-add',compact('Company'));
     }

     public function createData(EmployeesFormRequest $request)
     {

         $validateData = $request->validated();

         $company = Companies::findOrFail($validateData['company']);

         $filename = "";
         if($request->hasFile('profile_picture')){
            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->storeAs('public/employees', $filename);
        }

         $employee = $company->foreignEmployee()->create([
            'first_name' =>  $validateData['first_name'],
            'last_name' => $validateData['last_name'],
            'company' => $validateData['company'],
            'email' => $validateData['email'],
            'phone' => $validateData['phone'],
            'profile_picture' => $filename,
        ]);



         return redirect('employees')->with('message', 'Employee Added Successfully');

     }


     // edit company
     public function edit($EmployeeId)
     {
         $Employee = Employees::findOrFail($EmployeeId);
         $Company = Companies::all();
         return view('employees-edit',compact('Company','Employee'));
     }

     public function update(EmployeesFormRequest $request, $EmployeeId)
     {

         $validateData = $request->validated();

         $Employee = Employees::where('id',$EmployeeId)->first();

         $filename = "";
         if($request->hasFile('profile_picture')){

            if (Storage::exists('public/employees/'.$Employee->profile_picture)) {
                Storage::delete('public/employees/'.$Employee->profile_picture);
            }

            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->storeAs('public/employees', $filename);
        }else{
            $filename = $Employee->profile_picture;
        }

         if($Employee){

            $Employee->update([
                'first_name' =>  $validateData['first_name'],
                'last_name' => $validateData['last_name'],
                'company' => $validateData['company'],
                'email' => $validateData['email'],
                'phone' => $validateData['phone'],
                'profile_picture' => $filename,
            ]);


         return redirect('employees')->with('message', 'Employee Updated Successfully');

     }

    }


     //delete company
     public function destroy($EmployeeId){
         $Employee = Employees::findOrFail($EmployeeId);

         if (Storage::exists('public/employees/'.$Employee->profile_picture)) {
             Storage::delete('public/employees/'.$Employee->profile_picture);
         }

         $Employee->delete();
         return redirect('employees')->with('message','Employee Deleted Successfully');
     }

}
