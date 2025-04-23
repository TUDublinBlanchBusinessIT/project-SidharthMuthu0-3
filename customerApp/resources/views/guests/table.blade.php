<table class="table table-bordered table-hover align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>National ID</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guest->first_name }} {{ $guest->last_name }}</td>
                <td>{{ $guest->phone_number }}</td>
                <td>{{ $guest->email }}</td>
                <td>{{ $guest->national_id }}</td>
                <td>{{ $guest->created_at->format('Y-m-d') }}</td>
                <td class="d-flex justify-content-center gap-2">
                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('guests.destroy', $guest->id) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

