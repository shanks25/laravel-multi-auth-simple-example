@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ url('admin/users/create') }}" class="btn btn-primary">Add User</a>
                                <br>
                                <br>
                            </div>
                            @include('message')

                            <table id="datatable" class="table ">
                                <thead>
                                    <th>SNo.</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Action</t h>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="users/edit/{{ $user->id }}">Edit</a> <a
                                                    onclick="confirmDelete('this')"
                                                    href="users/delete/{{ $user->id }}">Delete</a></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
