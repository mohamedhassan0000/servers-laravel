<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::where('user_id', Auth::id())->get();
        return view('servers.index', ['servers' => $servers]);
    }
    public function create()
    {
        return view('servers.create');
    }
    public function store()
    {
        $valedatedData = request()->validate([
            'server_ip' => 'required|ip',
            'server_name' => 'required|string|max:255',
            'server_details' => 'required|string|max:500',
        ]);
        $valedatedData['user_id'] = Auth::id();

        Server::create($valedatedData);
        return to_route('servers.index');
    }
    public function show($id)
    {
        $server = Server::findorfail($id);
        return view('servers.show', ['server' => $server]);
    }
    public function edit($id)
    {
        $server = Server::findorfail($id);
        return view('servers.edit', ['server' => $server]);
    }
    public function update($id)
    {
        $valedatedData = request()->validate([
            'server_ip' => 'required|ip',
            'server_name' => 'required|string|max:255',
            'server_details' => 'required|string|max:500',
        ]);
        $server = Server::findorfail($id);
        $server->update($valedatedData);
        return to_route('servers.index');
    }
    public function destroy($id)
    {
        $server = Server::findorfail($id);
        $server->delete();
        return to_route('servers.index');
    }
}
