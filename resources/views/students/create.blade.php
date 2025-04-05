@extends('layouts.app')

@section('content')
    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @include('students.partials._form')

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
