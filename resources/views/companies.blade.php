@extends('include.admin')

@section('title','Companies')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

      <div class="d-flex justify-content-between align-items-baseline ">
        <h5 class="card-header">Companies</h5>

          <div>
            <a href="{{url('companies/create')}}" class="btn btn-primary me-3">Add Company</a>
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
                  <th>Website</th>
                  <th>Logo</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @php($i = 0)
                @foreach ($Companies as $company)
                  <tr>
                    <th scope="row">
                      {{ ++$i }}
                    </th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        @if(!$company->logo)
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" height="50">
                        @else
                        <img src="{{Storage::url('company/'.$company->logo)}}" height="50">
                        @endif


                    </td>
                     <td>
                    <a href="{{url('companies/'.$company->id.'/edit')}}" class="btn-sm btn btn-success">Edit</a>
                    </td>
                    <td>
                    <a href="{{url('companies/'.$company->id.'/delete')}}" onclick="return confirm('Are you sure,you want to delete {{ $company->name }} ?')" class="btn-sm btn btn-danger">Delete</a>
                   </td>

                  </tr>
                  @endforeach
              </tbody>
            </table>

          </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            {!! $Companies->links() !!}
            </div>
    </div>

    </div>
@endsection
