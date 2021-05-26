@extends('templates.main')

@section('content')
    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @method('PATCH')
        @include('admin.users.partials._form')
    </form>
@endsection
