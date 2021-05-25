@extends('templates.main')

@section('content')
    <h1 class="fw-bold mb-3 text-center">Create new Users</h1>

    <form action="{{ route('admin.users.store') }}" method="post">
    @csrf

    <!-- Name Form Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp"
                   name="name"
                   id="name"
                   type="text"
                   required
            >
            @error('name')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- Email Form Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp"
                   name="email"
                   id="email"
                   type="email"
                   required
            >
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- Password Form Input -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" aria-describedby="emailHelp"
                   name="password"
                   id="password"
                   type="password"
                   required
            >
            @error('password')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!-- Roles Form Input -->
        <div class="mb-3">
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                           name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}"
                    >
                    <label for="{{ $role->name }}" class="form-check-label">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            @error('roles')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
