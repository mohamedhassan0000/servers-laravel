@extends('layout.app')
@section('title')
    Create Page
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Create Server</h1>
        <form action="{{ route('servers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Server Name</label>
                <input type="text" class="form-control" id="name" name="server_name" value="{{ old('server_name') }}"
                    required>
                @error('server_name')
                    <div class="text-danger">{{ '*' . $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="server_ip" class="form-label">Server IP</label>
                <input type="text" class="form-control" id="server_ip" name="server_ip" value="{{ old('server_ip') }}"
                    required>
                @error('server_ip')
                    <div class="text-danger">{{ '*' . $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="server_details" class="form-label">Server Details</label>
                <input type="text" class="form-control" id="server_details" name="server_details"
                    value="{{ old('server_details') }}" required>
                @error('server_details')
                    <div class="text-danger">{{ '*' . $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Server</button>
        </form>
    </div>
@endsection
