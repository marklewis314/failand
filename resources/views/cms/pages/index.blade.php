@extends('cms.template')

@section('title', 'Pages')

@section('content')

<div class="grid grid-cols-12 gap-4">
@foreach ($pages as $page)
    <div class="col-span-8"><a href="/{{ $page->slug }}" target="page" class="hover:underline">{{ $page->title }} &#x21d7;</a></div>
    <div><a href="{{ route('pages.edit', $page->id) }}" class="inline-block bg-violet-500 hover:bg-violet-700 text-white px-4 py-2 rounded">Edit</a></div>
    <div><confirm-delete href="{{ route('pages.destroy', $page->id) }}" title="{{ $page->title }}" csrf="{{ csrf_token() }}">Delete</confirm-delete></div>
@endforeach
</div>

<div class="my-4"><a href="{{ route('pages.create') }}" class="inline-block bg-violet-500 hover:bg-violet-700 text-white px-4 py-2 rounded">Add page</a></div>

<div><a href="/cms" class="hover:underline">&lArr; CMS home</a></div>

@endsection




