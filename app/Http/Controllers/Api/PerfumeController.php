<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('category_id')) {
            $perfumes = Perfume::with('category')->where('category_id', $request->category_id)->paginate(10);
        } else {
            $perfumes = Perfume::with('category')->paginate(10);
        }
        return response()->json([
            'success' => true,
            'results' => $perfumes
        ]);
    }

    public function show($id)
    {
        $perfume = Perfume::with('category')->where('id', $id)->first();
        if ($perfume) {
            return response()->json([
                'success' => true,
                'results' => $perfume
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Nessun profumo trovato'
            ])->setStatusCode(404);
        }
    }
}
