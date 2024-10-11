<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Try
        {
            $categories = Categorie::all();
            return response()->json($categories);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Categorie([
                'nomcategorie' => $request->input("nomcategorie"),
                'imagecategorie' => $request->input("imagecategorie")
            ]);
            $categorie->save();
            return response()->json(['message' => 'Categorie created successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Category not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categorie = Categorie::findOrFail($id);    
           $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy($id)
    {
        try{
            $categorie = Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json(['message' => 'Categorie deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        //
    }
}
