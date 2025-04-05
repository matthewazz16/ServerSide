@extends('layouts.app')

@section('content')
    <h2>Edit College</h2>

    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('colleges.partials._form')

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection



