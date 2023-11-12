@extends('layouts.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Users</h1>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
    </div>
    <hr />
     
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone Number</th>
                <th>ID Card</th>
                <th>Registered</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
            @if($customers->count() > 0)
                @foreach($customers as $customer)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $customer->name }}</td>
                        <td class="align-middle">{{ $customer->address }}</td>
                        <td class="align-middle">{{ $customer->telephoneNumber }}</td>
                        <td class="align-middle">{{ $customer->IDcard }}</td>
                        <td class="align-middle">{{ $customer->created_at }}</td>
                                
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('/user/' . $customer->id) }}" type="button" class="btn btn-secondary">Orders</a>
                                <a href="" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('user.destroy', $customer->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
             
        </tbody>
    </table>
@endsection