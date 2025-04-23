<h1>Edit User Role</h1>

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <p><strong>{{ $user->name }}</strong> ({{ $user->email }})</p>

    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
    </select>

    <br><br>
    <button type="submit">Update Role</button>
</form>
