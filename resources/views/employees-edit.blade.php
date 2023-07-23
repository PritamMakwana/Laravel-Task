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
                    <h5 class="mb-0">Employee Edit</h5>
                </div>


                @if($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif


                <div class="card-body">
                    <form action="{{url('employees/'.$Employee->id.'/edit')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- first_name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="first_name"
                                value="{{$Employee->first_name}}"/>
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
                                <input type="text" class="form-control" id="basic-default-name" name="last_name"
                                value="{{$Employee->last_name}}"/>
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
                                    <option value="{{ $company->id }}"
                                     {{ $company->id == $Employee->company ? 'selected':'' }}   >{{ $company->name }}</option>
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
                                    <input type="text" id="basic-default-email" class="form-control" name="email"
                                    value="{{$Employee->email}}" />
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
                                    <input type="text" id="basic-default-email" class="form-control" name="phone"
                                    value="{{$Employee->phone}}"/>
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
                                    name="profile_picture"/>
                                    <p>(minimum size: 100x100)</p>

                                    @if(!$Employee->profile_picture)
                                    <img class ="m-3" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" width="200px" height="200px">

                                    @else
                                    <img class ="m-3" src="{{Storage::url('employees/'.$Employee->profile_picture)}}" width="200px" height="200px">
                                    @endif

                            </div>
                            <span class="text-danger">@error('profile_picture')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="save" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>



</div>

@endsection
