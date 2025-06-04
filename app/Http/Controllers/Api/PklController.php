<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pkl;
use Carbon\Carbon;
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
            'siswa_id' => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'guru_id' => 'required|exists:gurus,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);
        $mulaiDate = Carbon::parse($request->mulai);
        $selesaiDate = Carbon::parse($request->selesai);
        if ($mulaiDate->diffInDays($selesaiDate) < 90) {
            return response()->json(['message' => 'Lama PKL minimal 3 bulan.'], 422);
        }

        $internship = Pkl::create($request->all());
        return response()->json(['message' => 'Record PKL berhasil dibuat'], 201);
    }

    /**
     *
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
            'siswa_id' => 'sometimes|exists:siswas,id',
            'industri_id' => 'sometimes|exists:industris,id',
            'guru_id' => 'sometimes|exists:gurus,id',
            'mulai' => 'sometimes|date',
            'selesai' => 'sometimes|date',
        ]);
        if ($request->has('mulai') && !$request->has('selesai')) {
            $mulaiDate = Carbon::parse($request->mulai);
            $selesaiDate = Carbon::parse($internship->selesai);
            if ($mulaiDate->diffInDays($selesaiDate) < 90) {
                return response()->json(['message' => 'Lama PKL minimal 3 bulan.'], 422);
            }
        }
        if ($request->has('selesai') && !$request->has('mulai')) {
            $selesaiDate = Carbon::parse($request->selesai);
            $mulaiDate = Carbon::parse($internship->mulai);
            if ($mulaiDate->diffInDays($selesaiDate) < 90) {
                return response()->json(['message' => 'Lama PKL minimal 3 bulan.'], 422);
            }
        }

        if ($request->has('mulai') && $request->has('selesai')) {
            $mulaiDate = Carbon::parse($request->mulai);
            $selesaiDate = Carbon::parse($request->selesai);
            if ($mulaiDate->diffInDays($selesaiDate) < 90) {
                return response()->json(['message' => 'Lama PKL minimal 3 bulan.'], 422);
            }
        }

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
