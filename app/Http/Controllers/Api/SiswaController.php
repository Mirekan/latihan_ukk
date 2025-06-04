<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Siswa::with('pkl')->get();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswas,email',
            'nis' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:15',
        ]);

        $student = Siswa::create($request->all());

        return response()->json(['message' => 'Record siswa berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Siswa::with('pkl')->find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:siswas,email,' . $id,
            'nis' => 'sometimes|required|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:15',
        ]);

        $student = Siswa::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->update($request->all());
        return response()->json(['message' => 'Student updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Siswa::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
