@extends('layouts.app')

@section('content')
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('students.partials._form')

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

