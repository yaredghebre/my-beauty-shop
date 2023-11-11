<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerfumeRequest;
use App\Http\Requests\UpdatePerfumeRequest;
use App\Models\Category;
use App\Models\Perfume;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        if (($request->has('category_id') && !is_null($data['category_id'])) && ($request->has('type_id') && !is_null($data['type_id']))) {
            $perfumes = Perfume::where('category_id', $data['category_id'])->paginate(10);
            $perfumes = Perfume::where('type_id', $data['type_id'])->paginate(10);
        } else {
            $perfumes = Perfume::paginate(10);
        }

        $categories = Category::all();
        $types = Type::all();
        return view('admin.perfumes.index', compact('perfumes', 'categories', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.perfumes.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorePerfumeRequest $request)
    {
        $data = $request->validated();

        $perfume = new Perfume();
        $perfume->fill($data);
        $perfume->category_id = $request->category;
        $perfume->type_id = $request->type;

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('perfume_images', $request->image);
            $perfume->image = $path;
        }

        $perfume->save();

        return redirect()->route('admin.perfumes.index')->with('message', "{$perfume->title} è stato aggiunto!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perfume $perfume)
    {
        return view('admin.perfumes.show', compact('perfume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfume $perfume)
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.perfumes.edit', compact('perfume', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerfumeRequest $request, Perfume $perfume)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {

            if ($perfume->image) {
                Storage::delete($perfume->image);
            }

            $path = Storage::disk('public')->put('perfume_images', $request->image);
            $perfume->image = $path;
        }

        $perfume->update($data);

        if ($request->has('categories')) {
            $perfume->category()->sync($request->categories);
        }

        if ($request->has('types')) {
            $perfume->type()->sync($request->types);
        }

        return redirect()->route('admin.perfumes.index')->with('message', "{$perfume->title} è stato modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfume $perfume)
    {
        if ($perfume->image) {
            Storage::delete($perfume->image);
        }

        $perfume->delete();

        return redirect()->route('admin.perfumes.index')->with('message', "{$perfume->title} è stato cancellato!");
    }
}
