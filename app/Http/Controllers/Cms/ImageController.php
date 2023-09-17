<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::orderBy('image')->get();
        return view('cms.images.index')->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $image = new Image;
        return view('cms.images.edit')->with('image', $image);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        $image = new Image;
        $image->title = $request->title;
        if ($request->hasFile('image')) {
            $image->image = $request->image->storeAs('images', $request->image->getClientOriginalName(), 'public');
        } else {
            $image->image = '';
        }
        $image->alt = $request->alt ?? '';
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = image::findOrFail($id);
        return view('cms.images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = image::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
        ]);

        $image->title = $request->title;
        if ($request->has('delimage') or $request->hasFile('image')) {
            Storage::disk('public')->delete($image->image);
        }
        if ($request->hasFile('image')) {
            $image->image = $request->image->storeAs('images', $request->image->getClientOriginalName(), 'public');
        }
        $image->alt = $request->alt ?? '';
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = image::findOrFail($id);
        $image->delete();
        return redirect()->route('images.index');
    }
}
