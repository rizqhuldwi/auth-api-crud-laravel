<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return response()->json([
            'message' => 'Berhasil menampilkan data',
            'data' => $siswa
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaRequest $request)
    {
        $validated = $request->validated();
        $siswa = Siswa::create($validated);
        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'message' => 'Siswa tidak ditemukan',
                'data' => []
            ], 404);
        }
        return response()->json([
            'message' => 'Berhasil menampilkan data',
            'data' => $siswa
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiswaRequest $request, string $id)
    {
        $validated = $request->validated();
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'message' => 'Siswa tidak ditemukan',
                'data' => []
            ], 404);
        }
        return response()->json([
            'message' => 'Siswa berhasil diubah',
            'data' => $siswa
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'message' => 'Siswa tidak ditemukan',
                'data' => []
            ], 404);
        }
        $siswa->delete();
        return response()->json([
            'message' => 'Siswa berhasil dihapus',
            'data' => $siswa
        ], 200);
    }
}
