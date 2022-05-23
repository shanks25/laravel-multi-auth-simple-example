@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('message')
            <div class="col-md-8">
                <div class="row">
                    <div class="container">




                        <form action="{{ url('admin/users/store') }}" id="register" method="POST" name="register"
                            autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    placeholder="Enter your Name" value="{{ old('name') }}">
                            </div>


                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" name="email" class="form-control" required id="email"
                                    placeholder="example@abc.com" value="{{ old('email') }}" />
                            </div>



                            <div class="form-group">
                                <label> Role </label>
                                <select class="form-control" required id="role_id" name="role_id"
                                    value="{{ old('role') }}">
                                    <option value=""> Select Role </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" required name="password" id="password"
                                    value="{{ old('password') }}" />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"> Confirm Password</label>
                                <input id="password_confirmation" class="form-control" required
                                    name="password_confirmation" type="password" />
                            </div>
                            <br>
                            <input type="submit" value="submit" class="btn btn-primary ">
                            <input type="button" value="back" class="btn btn-warning "
                                onclick="window.history.go(-1); return false;">
                        </form>



                    </div>
                @endsection
