<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Page;
use App\Models\Section;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('rank')->get();
        return view('cms.pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = new Page;
        $page->rank = 0;
        $page->section_id = 1;
        return view('cms.pages.edit')->with('page', $page);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'slug' => 'required|unique:pages',
            'title' => 'required',
        ]);

        $page = new Page;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->abstract = $request->abstract ?? '';
        $page->content = $request->content ?? '';
        if ($request->hasFile('image')) {
            $page->image = $request->image->storeAs('images', $request->image->getClientOriginalName(), 'public');
        } else {
            $page->image = '';
        }
        $page->alt = $request->alt ?? '';
        $page->section_id = $request->section_id;
        Page::where('rank', '>=', $request->rank)->increment('rank');
        $page->rank = $request->rank;
        $page->save();

        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $id2)
    {
        $section = Section::where('slug', $id)->firstOrFail();
        $page = Page::where('section_id', $section->id)->where('slug', $id2)->firstOrFail();
        return view('page')->with('page', $page);
    }

    public function section(string $id)
    {
        $section = Section::where('slug', $id)->first();
        if ($section) {
            return view('section')->with('section', $section);
        }
        $page = Page::where('section_id', 1)->where('slug', $id)->firstOrFail();
        return view('page')->with('page', $page);
    }

    public function home()
    {
        $section = Section::findOrFail(1);
        $pages = Page::orderBy('rank')->get();
        return view('home')->with('section', $section)->with('pages', $pages);
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $pages = Page::where('title', 'like', "%$q%")->orWhere('abstract', 'like', "%$q%")->orWhere('content', 'like', "%$q%")->orderBy('rank')->get();
        $section = new Section;
        return view('search')->with('section', $section)->with('pages', $pages)->with('q', $request->q);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('cms.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug,' . $id,
            'title' => 'required',
        ]);

        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->abstract = $request->abstract ?? '';
        $page->content = $request->content ?? '';
        if ($request->has('delimage') or $request->hasFile('image')) {
            Storage::disk('public')->delete($page->image);
        }
        if ($request->hasFile('image')) {
            $page->image = $request->image->storeAs('images', $request->image->getClientOriginalName(), 'public');
        }
        $page->alt = $request->alt ?? '';
        $page->section_id = $request->section_id;
        if ($request->rank < $page->rank) {
            Page::whereBetween('rank', [$request->rank, $page->rank - 1])->increment('rank');
        } elseif ($request->rank > $page->rank) {
            Page::whereBetween('rank', [$page->rank + 1, $request->rank])->decrement('rank');
        }
        $page->rank = $request->rank;
        $page->save();

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $rank = $page->rank;
        $page->delete();
        Page::where('rank', '>', $rank)->decrement('rank');
        return redirect()->route('pages.index');
    }

}
