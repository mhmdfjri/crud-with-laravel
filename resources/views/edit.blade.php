@extends('home')
@section('content')
<div class="col d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Students</h1>
</div>
<form class="col g-3" method="POST" action="{{ route('students.update', $student->id) }}">
    @method('PUT')
    @csrf
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" placeholder="Students" class="form-control" required value="{{ $student->name }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">NPM</label>
        <input type="text" name="npm" placeholder="NPM" class="form-control" required value="{{ $student->npm }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" cols="2" rows="2" class="form-control" required>{{ $student->address }}</textarea>
    </div>
    <div class="col">
        <div class="d-grid">
            <a href="{{ route('students.index') }}" class="btn btn-danger">Cancel</a>
            <button class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection