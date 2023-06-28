@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Schedule</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="email">Route</label>
                                <input type="text" name="email" id="route" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Total Bookings</label>
                                <input type="number" name="phone" id="total_bookings" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Date/Time</label>
                                <input type="datetime-local" name="from" id="datetime" class="form-control" required>
                            </div>

                            <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary">Create Schedule</button>
                                <a href="{{ route('schedule.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX script to handle form submission -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle form submission
            $('#create-form').on('submit', function (event) {
                event.preventDefault();

                // Get the form data
                var formData = $(this).serialize();

                // Send an AJAX request to store the schedule
                $.ajax({
                    url: 'admin/schedules',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success response
                        alert(response.message);
                        // You can redirect to the index page or perform any other action here
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
