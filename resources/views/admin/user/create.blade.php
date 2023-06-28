@extends('layouts.master')

@section('content')
<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1> Users</h1>
        </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="container-fluid px-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>edit users
                        <a href="{{ url('admin/users/edit')}}" class="btn btn-primary" style="padding-top: 10px;">BACK</a>
                    </h4>

                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Full Name</label>
                            <p class="form-control">{{$user->name}}</p>
                        </div>

                        <div class="mb-3">
                            <label>Email Id</label>
                            <p class="form-control">{{$user->email}}</p>
                        </div>



                        <div class="mb-3">
                            <label>Created_at</label>
                            <p class="form-control">{{$user->created_at->format('d/m/y')}}</p>
                        </div>

                        <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
                            @csrf
                            @method('P')
                            <div class="mb-3">
                                <label>Role as</label>
                             <select name=""class="form-control">
                                 <option value="1" {{ $user->role_as=='1' ? 'selected':'' }} >Admin</option>
                                 <option value="0" {{ $user->role_as=='0' ? 'selected':'' }} >User</option>
                                 <option value="2" {{ $user->role_as=='2' ? 'selected':'' }} >Blogger</option>
                             </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">update user Role </button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>

        </div>


    </section>
</div>



@endsection
