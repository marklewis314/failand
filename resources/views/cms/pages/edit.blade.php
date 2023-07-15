@extends('cms.template')

@section('title', $page->title ? 'Edit Page' : 'Add Page')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $page->title ? route('pages.update', $page->id) : route('pages.store') }}" class="flex flex-col space-y-2" enctype="multipart/form-data">
    @csrf
    @if($page->title) <input type="hidden" name="_method" value="PUT"> @endif
    <div>
        <label for="section" class="font-bold">Section</label>
        <div>
            <select name="section_id" id="section" class="form-select rounded">
                {!! $page->section->options(old('section_id', $page->section_id)) !!}
            </select>
        </div>
    </div>

    <div>
        <label for="slug" class="font-bold">Slug*</label>
        <div>{{ url($page->section->slug) }}/<input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}" placeholder="lowercase-with-dashes" class="form-input rounded"></div>
    </div>

    <div>
        <label for="title" class="font-bold">Title*</label>
        <div><input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" placeholder="Title" class="form-input rounded w-1/2"></div>
    </div>

    <div>
        <label for="abstract" class="font-bold">Abstract</label>
        <div><textarea  name="abstract" id="abstract" placeholder="abstract" class="form-textarea rounded" cols="80" rows="4">{{ old('abstract', $page->abstract) }}</textarea></div>
    </div>
    
    <div>
        <label for="content" class="font-bold">Content</label>
        <div><textarea  name="content" id="content" placeholder="Content" class="form-textarea rounded" cols="80" rows="20">{{ old('content', $page->content) }}</textarea></div>
    </div>

    <div>
        <label for="image" class="font-bold">Image</label>
        @if ($page->image)
            <img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="h-48">
            <input type="checkbox" name="delimage" class="form-checkbox"> delete
        @endif
        <div><input type="file" name="image" id="image"></div>
        <label for="alt" class="font-bold">Alt</label>
        <div><input type="text" name="alt" id="alt" value="{{ old('alt', $page->alt) }}" placeholder="Alt" class="form-input rounded"></div>
    </div>

    <div>
        <label for="rank" class="font-bold">Rank</label>
        <div>
            <select name="rank" id="rank" class="form-select rounded">
                {!! $page->rankOptions(old('rank', $page->rank)) !!}
            </select>
        </div>
    </div>

    <div class="mt-4 flex space-x-1">
        <button type="submit" class="inline-block bg-violet-500 hover:bg-violet-700 text-white px-4 py-2 rounded">@if($page->title) Update @else Add @endif</button>
        <a class="inline-block bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded" href="{{ route('pages.index') }}">Cancel</a>
    </div>

</form>


@endsection




