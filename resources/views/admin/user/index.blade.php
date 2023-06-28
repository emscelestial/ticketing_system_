@extends('layouts.master')

@section('title', 'view users')

@section('content')

<div class="container">

    <div class="class-row">
        <div class="card mt-4">
            <div class="card-header">
                <h4>view users</h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
                @endif

                <table id= "myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item )
                        <tr>
                            <td> {{$item->id}} </td>
                            <td> {{$item->name}} </td>
                            <td> {{$item->email}} </td>
                            <td> {{$item->role_as == '1' ? 'Admin':'User '}} </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>

</div>


@endsection
