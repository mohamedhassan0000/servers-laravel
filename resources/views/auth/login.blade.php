@extends('layout.app')
@section('title')
    Login Page
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('login') }}" method="POST" class='mb-3'>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                {{-- validation --}}
                @if ($errors->any())
                    <div class="text-danger mt-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <a href="{{ route('show.register') }}" class="text-center">Don't have an account?</a>
            </div>
        </div>
    </div>
@endsection
