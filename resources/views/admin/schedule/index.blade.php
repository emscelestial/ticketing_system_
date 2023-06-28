@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Schedule Data</h1>
                        <a href="{{ route('schedule.create') }}" class="btn btn-primary btn-sm float-end">Add Schedule</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id= "myDataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Route</th>
                                        <th>Total Bookings</th>
                                        <th>Date/Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->id }}</td>
                                            <td>{{ $schedule->route }}</td>
                                            <td>{{ $schedule->total_bookings }}</td>
                                            <td>{{ $schedule->datetime }}</td>

                                            <td>
                                                <a href="{{ route('schedule.edit', $passenger->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('schedule.destroy', $passenger->id) }}" method="POST" style="display: inline-block;">
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

    <!-- AJAX script to handle deleting a schedule -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle delete button click
            $('.delete-btn').on('click', function () {
                var scheduleId = $(this).data('id');

                // Send an AJAX request to delete the schedule
                $.ajax({
                    url: '/schedule/' + scheduleId,
                    type: 'DELETE',
                    success: function (response) {
                        // Handle success response
                        alert(response.message);
                        // You can reload the page or perform any other action here
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        var errorMessage = xhr.responseJSON.message;
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
@endsection



