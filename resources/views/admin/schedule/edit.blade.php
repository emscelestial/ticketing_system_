@extends('layouts.master')

@section('content')
    <form id="edit-form">
        @csrf
        <div>
            <label for="route">Route:</label>
            <input type="text" name="route" id="route" value="{{ $schedule->route }}">
        </div>
        <div>
            <label for="total_bookings">Total Bookings:</label>
            <input type="number" name="total_bookings" id="total_bookings" value="{{ $schedule->total_bookings }}">
        </div>
        <div>
            <label for="datetime">Date/Time:</label>
            <input type="datetime-local" name="datetime" id="datetime" value="{{ $schedule->datetime }}">
        </div>
        <button type="submit">Update Schedule</button>
    </form>

    <!-- Assign the schedule ID to a JavaScript variable -->
    <script>
        var scheduleId = {{ $schedule->id }};
    </script>

    <!-- AJAX script to handle form submission -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle form submission
            $('#edit-form').on('submit', function (event) {
                event.preventDefault();

                // Get the form data
                var formData = $(this).serialize();

                // Send an AJAX request to update the schedule
                $.ajax({
                    url: 'admin/schedules/' + scheduleId,
                    type: 'PUT',
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
