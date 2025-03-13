<?php

namespace App\Http\Controllers;

use App\Models\Potion;
use Illuminate\Http\Request;

class PotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Potion::with("ingredients", "wizards")->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'magical_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'curative' => 'required|boolean',
            'magic_level_required' => 'required|integer|min:1',
        ]);

        return Potion::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Potion::with('ingredients', 'wizards')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $potion = Potion::findOrFail($id);
        $potion->update($request->all());

        return $potion;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Potion::destroy($id);
        return response()->json(['message' => 'Potion deleted']);
    }
}
