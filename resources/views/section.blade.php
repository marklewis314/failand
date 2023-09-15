@extends('template')

@section('title', $section->title)
@section('nav') {!! $section->nav() !!} @endsection
@section('path') {!! $section->path() !!} @endsection

@section('content')

<div class="grid md:grid-cols-3 gap-4">
@foreach($section->pages as $page)
<a href="/{{ $page->fullSlug() }}" class="p-4 shadow-lg border">
    <img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="">
    <h2 class="text-xl my-2">{{ $page->title }}</h2>
    {!! $page->abstract !!}    
</a>
@endforeach
</div>

@endsection




