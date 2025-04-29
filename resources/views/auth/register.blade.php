@extends('layout.app')
@section('title')
    Register Page
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Register</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('register') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        @error('name')
                            <div class="text-danger">{{ '*' . $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="text-danger">{{ '*' . $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger">{{ '*' . $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            required>
                        @error('password_confirmation')
                            <div class="text-danger">{{ '*' . $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <a href="{{ route('show.login') }}">Already have an account?</a>
            </div>
        </div>
    </div>
@endsection
