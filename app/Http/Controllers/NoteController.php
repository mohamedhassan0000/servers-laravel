<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store($id)
    {
        $validatedData = request()->validate([
            'note' => 'required|string|max:500',
        ]);
        $validatedData['server_id'] = $id;

        Note::create($validatedData);
        return to_route('servers.index', ['id' => $id]);
    }
    public function edit($id)
    {
        $note = Note::findorfail($id);
        return view('servers.show', ['note' => $note]);
    }
    public function update($id)
    {
        $validatedData = request()->validate([
            'note' => 'required|string|max:500',
        ]);
        $note = Note::findorfail($id);
        $note->update($validatedData);
        return to_route('servers.show', ['id' => $note->server_id]);
    }
    public function destroy($id)
    {
        $note = Note::findorfail($id);
        $note->delete();
        return to_route('servers.show', ['id' => $note->server_id]);
    }
}
