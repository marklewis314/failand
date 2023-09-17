@extends('cms.template')

@section('title', 'Images')

@section('content')

<div class="grid grid-cols-12 gap-4 w-4/5">
@foreach ($images as $image)
    <div class="col-span-5">{{ $image->title }}</div>
    <div class="col-span-3">{{ $image->image }}</div>
    <div class="col-span-2"><img src="/{{ $image->image }}" alt="{{ $image->alt }}" ></div>
    <div><a href="{{ route('images.edit', $image->id) }}" class="inline-block bg-lime-700 hover:bg-lime-600 text-white px-4 py-2 rounded">Edit</a></div>
    <div><confirm-delete href="{{ route('images.destroy', $image->id) }}" title="{{ $image->title }}" csrf="{{ csrf_token() }}">Delete</confirm-delete></div>
@endforeach
</div>

<div class="my-4"><a href="{{ route('images.create') }}" class="inline-block bg-lime-700 hover:bg-lime-600 text-white px-4 py-2 rounded">Add image</a></div>

<div><a href="/cms" class="hover:underline">&lArr; CMS home</a></div>

@endsection




