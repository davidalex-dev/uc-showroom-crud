@extends('layouts.layout')

@section('content')
    
    <h1 class="mb-0">Edit User</h1>
    <hr />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=row mb-3>

            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
            </div>

            <div class="col">
                <input type="text" name="telephoneNumber" class="form-control" placeholder="Telephone Number" value="{{ $user->telephoneNumber }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $user->address }}">
            </div>

            <div class="col">
                <input type="text" name="IDcard" class="form-control" placeholder="ID Card" value="{{ $user->IDcard }}">
            </div>

        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection