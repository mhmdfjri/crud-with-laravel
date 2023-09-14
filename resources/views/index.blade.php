@extends('home')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Mahasiswa</h1>
        <a href="{{ route('students.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add
            Student</a>
    </div>
    <hr>
    @if (Session::has('success-create'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success-create') }}
        </div>
    @endif
    @if (Session::has('success-update'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success-update') }}
        </div>
    @endif
    @if (Session::has('success-delete'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success-delete') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>NPM</th>
                <th>Adress</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($students->count() > 0)
                @foreach ($students as $student)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $student->name }}</td>
                        <td class="align-middle">{{ $student->npm }}</td>
                        <td class="align-middle">{{ $student->address }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Mahasiswa Tidak Ada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
