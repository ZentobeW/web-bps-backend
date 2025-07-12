<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        return Publikasi::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'sometimes|nullable|url',
        ]);
        $publikasi = Publikasi::create($validated);
        return response()->json($publikasi, 201);
    }

    public function show($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        return response()->json($publikasi, 200);
    }

    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::findOrFail($id);

        // Validasi hanya untuk field yang dikirim
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'releaseDate' => 'sometimes|required|date',
            'description' => 'sometimes|nullable|string',
            'coverUrl' => 'sometimes|nullable|url',
        ]);

        // Update hanya field yang ada dalam request
        $publikasi->update($validated);

        return response()->json($publikasi, 200);
    }

    public function destroy($id)
    {
        $publikasi = Publikasi::findOrFail($id);
        $publikasi->delete();
        return response()->json(['message' => 'Berhasil dihapus'], 204);
    }
}
