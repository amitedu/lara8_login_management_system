@extends('templates.main')


@section('content')

    <h1>Verify Email</h1>
    <p>Verify your email to access this page.</p>

    <form method="post" action="{{ route('verification.send') }}">
    @csrf

        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
    </form>

@endsection
