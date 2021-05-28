@extends('templates.main')

@section('content')
    <form action="{{ route('user-profile-information.update') }}" method="post">
    @csrf
    @method('PUT')

        <!-- Name Form Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp"
                   name="name"
                   id="name"
                   type="text"
                   value="{{ auth()->user()->name }}"
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
                   value="{{ auth()->user()->email }}"
                   required
            >
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
