@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')

@endsection

@section('content')

@include('main.layouts.message')
    <div class=" container-fluid ">
        <div class="card w-50 m-auto">
            <div class="card-header bg-primary">
                <div class=" text-center text-white">Account Setting </div>
            </div>
            <div class="card-body m-2">
                @foreach ($data as $user)
                    <form action="{{ URL::to('update_password') }}" method="POST">
                        @csrf
                        <div class="col">
                            <div class="form-group">
                                <label for="">name</label>
                                <input class=" form-control" style="border-radius:0.25rem "type="hidden" id="id"
                                    name="id" value="{{ $user->id }}">
                                    <input class=" form-control @error('name') form-control-danger  @enderror"
                                    style="border-radius:0.25rem " type="text" id="name" name="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <small class="form-text text-muted">required name</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">email</label>
                                <input class=" form-control @error('email')  form-control-danger @enderror" type="email"
                                    id="email" name="email" value="{{ $user->email }}" disabled>
                                @error('email')
                                    <small class="form-text text-muted">already exits</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col" type="hidden">
                            <div class=" form-group">
                                <select class="custom-select custom-select-sm" name="is_admin" id="is_admin" hidden>
                                    @if ($user->is_admin == 1)
                                        <option value="1">admin</option>
                                        <option value="2">customer</option>
                                    @else
                                        <option value="2">customer</option>
                                        <option value="1">admin</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">password</label>
                                <input class=" form-control @error('password') form-control-danger  @enderror"
                                    style="border-radius:0.25rem " type="Password" id="password" name="password">
                                @error('password')
                                    <small class="form-text text-muted"> 6-18 characters</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for=""> confirm password</label>
                                <input class=" form-control @error('conf_password') form-control-danger   @enderror" style="border-radius:0.25rem " type="password"
                                    id="conf_password" name="conf_password">
                                    @error('conf_password')
                                <small class="form-text text-muted">please confirm password</small>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 mt-3">
                                <a class="btn btn-secondary float-left text-white" href="{{ URL::to('/') }}"> Back</a>
                                <button class="btn btn-primary float-right " type="submit"> Submit</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

    </div>


@endsection

@section('footer_script')

@endsection
