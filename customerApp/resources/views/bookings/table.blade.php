<table class="table table-responsive" id="bookings-table">
    <thead>
        <th>Guest Id</th>
        <th>Room Number</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Payment Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->guest_id !!}</td>
            <td>{!! $booking->room_number !!}</td>
            <td>{!! $booking->check_in_date !!}</td>
            <td>{!! $booking->check_out_date !!}</td>
            <td>{!! $booking->payment_status !!}</td>
            <td>
                {!! Form::open(['route' => ['bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bookings.show', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('bookings.edit', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>