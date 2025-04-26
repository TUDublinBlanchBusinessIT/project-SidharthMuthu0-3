<table class="table table-bordered table-hover text-center mb-0">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Hire Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->position }}</td>
                <td>{{ $member->phone_number }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ \Carbon\Carbon::parse($member->hire_date)->format('Y-m-d') }}</td>
                <td class="d-flex justify-content-center gap-2">
                    <a href="{{ route('staff.edit', $member->id) }}" class="btn btn-sm btn-primary">
                        Edit
                    </a>

                    <form action="{{ route('staff.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
