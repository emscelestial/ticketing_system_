@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">
                    <h1>Passenger Data</h1>
                    <a href="{{ route('passenger.create') }}" class="btn btn-primary btn-sm float-end">Add Passenger</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($passengers as $passenger)
                                <tr>
                                    <td>{{ $passenger->id }}</td>
                                    <td>{{ $passenger->name }}</td>
                                    <td>{{ $passenger->email }}</td>
                                    <td>{{ $passenger->phone }}</td>
                                    <td>{{ $passenger->from }}</td>
                                    <td>{{ $passenger->to }}</td>
                                    <td>
                                        @if($passenger->image)
                                        <img src="{{ route('passenger.image', $passenger->image) }}" alt="Passenger Image" height="100" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('passenger.edit', $passenger->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('passenger.destroy', $passenger->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
