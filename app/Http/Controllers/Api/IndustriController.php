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
        $industries = Industri::all();
        return response()->json($industries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $industry = Industri::find($id);
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
        //
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
