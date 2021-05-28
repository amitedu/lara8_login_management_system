@extends('templates.main')

@section('content')
    <form action="{{ url('reset-password') }}" method="post">
    @csrf

        <input type="hidden" name="token" value="{{ $request->token }}">

        <!-- Email Form Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp"
                   name="email"
                   id="email"
                   type="email"
                   value="{{ $request->email }}"
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
        <!-- Password_confirmation Form Input -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                   aria-describedby="emailHelp"
                   name="password_confirmation"
                   id="password_confirmation"
                   type="password"
                   required
            >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
