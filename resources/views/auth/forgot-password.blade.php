@extends('templates.main')


@section('content')
    <h1>Reset Password</h1>

    <form action="{{ route('password.email') }}" method="post">
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

        <button type="submit" class="btn btn-primary">Reset Password</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
