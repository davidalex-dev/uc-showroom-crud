@extends('layouts.layout')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Please Register</h2>
                <form>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="username"
                        v-model="username"
                        required
                        placeholder="Username"/>
                    </div>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="fullname"
                        v-model="fullname"
                        required
                        placeholder="Full Name"/>
                    </div>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="email"
                        v-model="email"
                        required
                        placeholder="Email Address"/>
                    </div>

                    <div class="form-group">
                        <input
                        type="password"
                        class="form-control"
                        id="password"
                        v-model="password"
                        required
                        placeholder="Password"/>
                        <div v-if="password.length > 1 && password.length < 6" class="text-danger">Password length must be greater than 6</div>
                    </div>

                    <div class="form-group">
                        <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                        v-model="confirmPassword"
                        required
                        placeholder="Confirm Password"/>
                        
                    </div>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="phoneNumber"
                        v-model="phoneNumber"
                        required
                        placeholder="Phone Number"/>
                    </div>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="address"
                        v-model="address"
                        required
                        placeholder="Address"/>
                    </div>

                    <div class="form-group">
                        <input
                        type="text"
                        class="form-control"
                        id="inputID"
                        v-model="inputID"
                        required
                        placeholder="ID Number"/>
                    </div>

                    <div v-if="password != confirmPassword" class="text-danger">Passwords don't match</div>

                    <button @click="register" type="submit" class="btn btn-primary">Register</button>

                </form>

            </div>
        </div>
    </div>

@endsection