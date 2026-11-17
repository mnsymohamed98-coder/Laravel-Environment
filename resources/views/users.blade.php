
@extends('layouts.app')

@section('content')

<section class="card users-page" id="users">

    <h2>Users Management</h2>
    <p class="users-subtitle">Add and manage users</p>

    <div class="user-panel">

        @if(isset($editingUser))
            <h3>Update User</h3>

            <form action="/users/update/{{ $editingUser->id }}"
                  method="POST" class="user-form">
                @csrf

                <label for="user-name">Name</label>
                <input id="user-name" type="text" name="name"
                       value="{{ old('name', $editingUser->name) }}"
                       placeholder="Enter full name" required>

                <label for="user-email">Email Address</label>
                <input id="user-email" type="email" name="email"
                       value="{{ old('email', $editingUser->email) }}"
                       placeholder="Enter email address" required>

                <button type="submit" class="add-btn user-submit">
                    Update User
                </button>

                <a href="/users" class="cancel-btn user-cancel">
                    Cancel
                </a>
            </form>
        @else
            <h3>Add New User</h3>

            <form action="/users" method="POST" class="user-form">
                @csrf

                <label for="user-name">Name</label>
                <input id="user-name" type="text" name="name"
                       value="{{ old('name') }}"
                       placeholder="Enter full name" required>

                <label for="user-email">Email Address</label>
                <input id="user-email" type="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter email address" required>

                <label for="user-password">Password</label>
                <input id="user-password" type="password" name="password"
                       placeholder="Minimum 8 characters"
                       minlength="8" required>

                <button type="submit" class="add-btn user-submit">
                    Add User
                </button>
            </form>
        @endif

        @if($errors->any())
            <div class="user-errors">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

    </div>

    <h3 class="users-list-title">Users List</h3>

    <div class="course-list">
        @forelse($users as $user)
            <div class="course-item user-item">
                <div class="user-info">
                    <strong>{{ $user->name }}</strong>
                    <span>{{ $user->email }}</span>
                </div>

                <div class="course-actions">
                    <a href="/users/edit/{{ $user->id }}"
                       class="edit-btn">Edit</a>

                    <form action="/users/delete/{{ $user->id }}"
                          method="POST">
                        @csrf

                        <button type="submit" class="delete-btn">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="users-empty">
                <p>No users added yet.</p>
            </div>
        @endforelse
    </div>

</section>

@endsection
