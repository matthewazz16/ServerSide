@extends('layouts.app')

@section('content')
    <h2>Add College</h2>

    <form action="{{ route('colleges.store') }}" method="POST">
        @include('colleges.partials._form')

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

