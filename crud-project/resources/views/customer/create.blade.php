@extends('layouts.layout')

@section('content')
    
    <h1 class="mb-0">Add User</h1>
    <hr />

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class=row mb-3>

            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>

            <div class="col">
                <input type="text" name="telephoneNumber" class="form-control" placeholder="Telephone Number">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>

            <div class="col">
                <input type="text" name="IDcard" class="form-control" placeholder="ID Card">
            </div>

        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection