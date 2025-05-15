
<form action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $user->name }}" required><br><br>

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $user->email }}" required><br><br>

    <button type="submit">Update User</button>
</form>
