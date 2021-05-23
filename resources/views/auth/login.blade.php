@extends('templates.main')


@section('content')
    <h1>Login</h1>

    <form action="{{ route('login') }}" method="post">
    @csrf

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

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
