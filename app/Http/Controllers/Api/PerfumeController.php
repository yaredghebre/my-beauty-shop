<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request)
    {
        $query = Perfume::with('category', 'type');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        $perfumes = $query->paginate(9);

        return response()->json([
            'success' => true,
            'results' => $perfumes
        ]);
    }

    public function show($id)
    {
        $perfume = Perfume::with('category', 'type')->where('id', $id)->first();

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
