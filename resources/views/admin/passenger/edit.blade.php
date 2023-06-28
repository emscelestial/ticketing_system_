@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header" >
                    <h1>Edit Passenger</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('passenger.update', $passenger->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $passenger->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $passenger->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $passenger->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="text" name="from" id="from" class="form-control" value="{{ $passenger->from }}" required>
                        </div>
                        <div class="form-group">
                            <label for="to">To</label>
                            <input type="text" name="to" id="to" class="form-control" value="{{ $passenger->to }}" required>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" value="{{ $passenger->image }}" id="image" class="form-control-file" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('passenger.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
