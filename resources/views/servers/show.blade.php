@extends('layout.app')
@section('title')
    server details
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Server Details</h1>
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title">Server ID: </h5>
                <p class="card-text">{{ $server->id }}</p>
                <h5 class="card-title">Server Name: </h5>
                <p class="card-text">{{ $server->server_name }}</p>
                <h5 class="card-title">Server IP: </h5>
                <p class="card-text">
                    <a href="http://{{ $server->server_ip }}" class="text-decoration-none text-dark">
                        {{ $server->server_ip }}
                    </a>
                </p>
                <h5 class="card-title">Server Details: </h5>
                <p class="card-text">{{ $server->server_details }}</p>
                <h5 class="card-title">Notes: </h5>
                @if ($server->note->count())
                    <ul class="list-group">
                        @foreach ($server->note as $note)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1">{{ $note->note }}</p>
                                </div>
                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editNoteModal{{ $note->id }}">
                                        Edit Note
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editNoteModal{{ $note->id }}" tabindex="-1"
                                        aria-labelledby="editNoteModalLabel{{ $note->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editNoteModalLabel{{ $note->id }}">
                                                        Edit Note</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="note" class="form-label">Note</label>
                                                            <textarea class="form-control" id="note{{ $note->id }}" name="note" rows="3">{{ $note->note }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update Note</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="card-text">No notes available for this server.</p>
                @endif
                <h5 class="card-title">Created At: </h5>
                <p class="card-text">{{ $server->created_at->format('Y-m-d H:i:s') }}</p>
                <h5 class="card-title">Updated At: </h5>
                <p class="card-text">{{ $server->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
        <div class="my-3">
            <a href="{{ route('servers.edit', $server->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('servers.destroy', $server->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        <a href="{{ route('servers.index') }}" class="btn btn-primary">Back to Servers</a>
    </div>
@endsection
