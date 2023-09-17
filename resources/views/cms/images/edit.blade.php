@extends('cms.template')

@section('title', $image->title ? 'Edit image' : 'Add image')

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

<form method="POST" action="{{ $image->title ? route('images.update', $image->id) : route('images.store') }}" class="flex flex-col space-y-2" enctype="multipart/form-data">
    @csrf
    @if($image->title) <input type="hidden" name="_method" value="PUT"> @endif

    <div>
        <label for="title" class="font-bold">Title*</label>
        <div><input type="text" name="title" id="title" value="{{ old('title', $image->title) }}" placeholder="Title" class="form-input rounded w-1/2"></div>
    </div>

    <div>
        <label for="image" class="font-bold">Image</label>
        @if ($image->image)
            <img src="/{{ $image->image }}" alt="{{ $image->alt }}" class="h-48">
            <input type="checkbox" name="delimage" class="form-checkbox"> delete
        @endif
        <div><input type="file" name="image" id="image"></div>
        <label for="alt" class="font-bold">Alt</label>
        <div><input type="text" name="alt" id="alt" value="{{ old('alt', $image->alt) }}" placeholder="Alt" class="form-input rounded"></div>
    </div>

    <div class="mt-4 flex space-x-1">
        <button type="submit" class="inline-block bg-lime-700 hover:bg-lime-600 text-white px-4 py-2 rounded">@if($image->title) Update @else Add @endif</button>
        <a class="inline-block bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded" href="{{ route('images.index') }}">Cancel</a>
    </div>

</form>


@endsection




