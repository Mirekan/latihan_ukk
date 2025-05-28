<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pkl;
use Illuminate\Http\Request;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $internships = Pkl::with(['siswa', 'guru', 'industri'])->get();
        return response()->json($internships);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'industri_id' => 'required|exists:industri,id',
            'guru_id' => 'required|exists:guru,id',
            'mulai' => 'required|date',
            'laporan' => 'nullable|string',
            'selesai' => 'required|date',
        ]);

        $internship = Pkl::create($request->all());
        return response()->json(['message' => 'Record PKL berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $internship = Pkl::with(relations: ['siswa', 'guru', 'industri'])->find($id);
        if (!$internship) {
            return response()->json(['message' => 'PKL not found'], 404);
        }
        return response()->json($internship);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $internship = Pkl::find($id);
        if (!$internship) {
            return response()->json(['message' => 'PKL not found'], 404);
        }

        $request->validate([
            'siswa_id' => 'sometimes|exists:siswa,id',
            'industri_id' => 'sometimes|exists:industri,id',
            'guru_id' => 'sometimes|exists:guru,id',
            'mulai' => 'sometimes|date',
            'selesai' => 'sometimes|date',
        ]);

        $internship->update($request->all());
        return response()->json(['message' => 'PKL updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $internship = Pkl::find($id);
        if (!$internship) {
            return response()->json(['message' => 'PKL not found'], 404);
        }

        $internship->delete();
        return response()->json(['message' => 'PKL deleted successfully']);
    }
}
