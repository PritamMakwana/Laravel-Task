@extends('include.admin')

@section('title','Companies')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

          <div class="d-flex justify-content-end mb-3">
            <a href="{{url('companies')}}" class="btn btn-danger me-3">Back</a>
          </div>


    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Company Edit</h5>
                </div>

                @if($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card-body">
                    <form action="{{url('companies/'.$Company->id.'/edit')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" name="name" value="{{$Company->name}}"/>
                            </div>
                            <span class="text-danger">@error('name')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <!-- email -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control" name="email" value="{{$Company->email}}" />
                                </div>
                            </div>
                            <span class="text-danger">@error('email')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <!-- logo -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Logo </label>

                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control phone-mask"
                                    aria-describedby="basic-default-phone"
                                    name="logo"  />
                                    <p>(minimum size: 100x100)</p>

                                    @if(!$Company->logo)
                                    <img class ="m-3" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" width="200px" height="200px">

                                    @else
                                    <img class ="m-3" src="{{Storage::url('company/'.$Company->logo)}}" width="200px" height="200px">
                                    @endif
                            </div>

                            <span class="text-danger">@error('logo')
                                {{$message}}
                               @enderror
                               </span>
                        </div>

                        <!-- Website -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Website</label>
                            <div class="col-sm-10">
                                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                    aria-describedby="basic-default-phone"
                                    name="website" value="{{$Company->website}}"/>
                            </div>
                            <span class="text-danger">@error('website')
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
