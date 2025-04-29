@extends('layout.app')
@section('title')
    Edit Page
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Edit Server</h1>
        <form action="{{ route('servers.update', $server->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Server Name</label>
                <input type="text" class="form-control" id="name" name="server_name" value="{{ $server->server_name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="server_ip" class="form-label">Server IP</label>
                <input type="text" class="form-control" id="server_ip" name="server_ip" value="{{ $server->server_ip }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="server_details" class="form-label">Server Details</label>
                <input type="text" class="form-control" id="server_details" name="server_details"
                    value="{{ $server->server_details }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Server</button>
        </form>
    </div>
@endsection
