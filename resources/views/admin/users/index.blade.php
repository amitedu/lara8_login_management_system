@extends('templates.main')

@section('content')
    <div class="d-flex justify-content-between mb-3 py-2">
        <h1 class="">Users</h1>
        <a class="btn btn-success text-center px-4 pt-2 fw-bold" href="{{ route('admin.users.create') }}">Create</a>
    </div>
    <table class="table table-success table-hover table-striped table-responsive">
        <thead class="thead-inverse">
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user->id) }}" role="button">Edit</a>
                    <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
