@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')

@endsection

@section('content')

    @include('main.layouts.message')
    <div class=" container-fluid">
        <div class="card w-50 m-auto">
            <div class="card-header bg-primary  ">
                <div class=" text-center text-white"> Create user </div>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('users/insertuser') }}" method="POST">
                    @csrf
                    <div class="col">
                        <div class="form-group">
                            <label>name</label>
                            <input class="form-control @error('name') form-control-danger  @enderror" type="text"
                                id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <small class="form-text text-muted">required name</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control @error('email')  form-control-danger @enderror " type="email"
                                id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class="form-text text-muted">already exits</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control @error('password') form-control-danger  @enderror" type="password"
                                id="password" name="password">
                            @error('password')
                                <small class="form-text text-muted"> 6-18 characters</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>confirm password</label>
                            <input class="form-control  @error('conf_password') form-control-danger   @enderror"
                                type="password" id="conf_password" name="conf_password">
                            @error('conf_password')
                                <small class="form-text text-muted">please confirm password</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-secondary float-left text-white" href="{{ URL::to('users') }}"> Back</a>
                            <button class="btn btn-primary float-right " type="submit"> Create </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>

@endsection

@section('footer_script')
@endsection
