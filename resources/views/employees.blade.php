@extends('include.admin')

@section('title','Employees')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

      <div class="d-flex justify-content-between align-items-baseline ">
        <h5 class="card-header">Employees</h5>

          <div>
            <a href="{{url('employees/create')}}" class="btn btn-primary me-3">Add employees</a>
          </div>
        </div>



        <div class="card mb-4">
            <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr class="text-nowrap">
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Company</th>
                  <th>Profile</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @php($i = 0)
                @foreach ($employees as $employee)
                  <tr>
                    <th scope="row">
                      {{ ++$i }}
                    </th>

                    <td>{{ $employee->first_name." ".$employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->companyData->name }}</td>

                    <td>
                        @if(!$employee->profile_picture)
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" height="50">
                        @else
                        <img src="{{Storage::url('employees/'.$employee->profile_picture)}}" height="50">
                        @endif
                    </td>
                     <td>
                    <a href="{{url('employees/'.$employee->id.'/edit')}}" class="btn-sm btn btn-success">Edit</a>
                    </td>
                    <td>
                    <a href="{{url('employees/'.$employee->id.'/delete')}}" onclick="return confirm('Are you sure,you want to delete - {{ $employee->first_name.' '.$employee->last_name }} ?')" class="btn-sm btn btn-danger">Delete</a>
                   </td>

                  </tr>
                  @endforeach
              </tbody>
            </table>

          </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {!! $employees->links() !!}
            </div>
    </div>

    </div>
@endsection
