@extends('layout.app')
@section('title')
    Home Page
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Servers</h1>
        <a href="{{ route('servers.create') }}" class="btn btn-primary mb-3">Add Server</a>

        @if (count($servers))
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Name</th>
                        <th>IP Address</th>
                        <th>Detais</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servers as $index => $server)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $server->server_name }}</td>
                            <td><a href="http://{{ $server->server_ip }}"
                                    class="text-decoration-none text-dark">{{ $server->server_ip }}</a></td>
                            <td>{{ $server->server_details }}</td>
                            <td>{{ $server->note->count() ? 'Has Notes ' : 'null' }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Add Note
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Note</h1>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('notes.store', $server->id) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="note" class="form-label">Note</label>
                                                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                                    </div>
                                                    <input type="hidden" name="server_id" value="{{ $server->id }}">
                                                    <button type="submit" class="btn btn-primary">Add Note</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('servers.show', $server->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('servers.edit', $server->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('servers.destroy', $server->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('متأكد؟')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-warning mt-3">
                <strong>There Are Not Any Servers</strong>
            </p>
        @endif
    </div>
@endsection
