<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industri;

class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $industries = Industri::with('pkl')->get();
        return response()->json($industries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|max:255|exists:industris,email',
            'website' => 'required|url|max:255',
        ]);

        $industry = Industri::create($request->all());
        return response()->json(['message' => 'Industry created successfully', 'industry' => $industry], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $industry = Industri::with('pkl')->find($id);
        if (!$industry) {
            return response()->json(['message' => 'Industry not found'], 404);
        }
        return response()->json($industry);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'bidang_usaha' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
            'kontak' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|email|max:255|exists:industris,email',
            'website' => 'sometimes|required|url|max:255',
        ]);

        $industry = Industri::find($id);
        if (!$industry) {
            return response()->json(['message' => 'Industry not found'], 404);
        }

        $industry->update($request->all());
        return response()->json(['message' => 'Industry updated successfully', 'industry' => $industry]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $industry = Industri::find($id);
        if (!$industry) {
            return response()->json(['message' => 'Industry not found'], 404);
        }

        $industry->delete();
        return response()->json(['message' => 'Industry deleted successfully']);
    }
}
