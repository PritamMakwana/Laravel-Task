@extends('include.admin')

@section('title','Employees')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

          <div class="d-flex justify-content-end mb-3">
            <a href="{{url('employees')}}" class="btn btn-danger me-3">Back</a>
          </div>


    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Employee Add</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('employees/create')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <!-- first_name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="first_name" value="{{old('first_name')}}"/>
                            </div>
                            <span class="text-danger">@error('first_name')
                                {{$message}}
                               @enderror
                               </span>
                        </div>


                         <!-- last_name -->
                         <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="last_name" value="{{old('last_name')}}"/>
                            </div>
                            <span class="text-danger">@error('last_name')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Company Select</label>
                            <div class="col-sm-10">
                                <select  class="form-control" id="basic-default-name" name="company" >
                                    @foreach ($Company as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select >
                            </div>
                            <span class="text-danger">@error('company')
                                {{$message}}
                               @enderror
                               </span>
                        </div>



                        <!-- email -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control" name="email" value="{{old('email')}}" />
                                </div>
                            </div>
                            <span class="text-danger">@error('email')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                          <!-- Phone -->
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Phone</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control" name="phone" value="{{old('phone')}}" />
                                </div>
                            </div>
                            <span class="text-danger">@error('phone')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <!-- profile_picture -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Profile Picture </label>

                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control phone-mask"
                                    aria-describedby="basic-default-phone"
                                    name="profile_picture" value="{{old('profile_picture')}}" />
                                    <p>(minimum size: 100x100)</p>
                            </div>
                            <span class="text-danger">@error('profile_picture')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="save" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>



</div>

@endsection
