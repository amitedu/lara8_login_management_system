@csrf

<!-- Name Form Input -->
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp"
           name="name"
           id="name"
           type="text"
           value="{{ old('name') }} @isset($user->name) {{ $user->name }} @endisset"

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
           value="{{ old('email') }} @isset($user->email) {{ $user->email }} @endisset"

    >
    @error('email')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>

<!-- Password Form Input -->
@isset($create)
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input class="form-control @error('password') is-invalid @enderror" aria-describedby="emailHelp"
               name="password"
               id="password"
               type="password"

        >
        @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>
@endisset

<!-- Roles Form Input -->
<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input type="checkbox" class="form-check-input"
                   name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}"
                   @isset( $user ) @if( in_array($role->id, $user->roles->pluck('id')->toArray(), true))  checked @endif @endisset
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

<button type="submit" class="btn btn-primary">{{ $create ?? 'Update' }}</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
