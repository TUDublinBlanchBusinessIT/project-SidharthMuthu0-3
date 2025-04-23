<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">Edit Role for <strong>{{ $user->name }}</strong></h2>

        <form method="POST" action="{{ route('users.update', $user->id) }}" class="card p-4 shadow-sm bg-white">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">User Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Assign Role</label>
                <select name="role" id="role" class="form-select">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Role</button>
            </div>
        </form>
    </div>

</body>
</html>
