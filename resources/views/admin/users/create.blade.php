@extends('templates.main')

@section('content')
    <h1 class="fw-bold mb-3 text-center">Create new Users</h1>

    <form action="{{ route('admin.users.store') }}" method="post">

        @include('admin.users.partials._form', ['create' => 'Create'])

    </form>
@endsection
