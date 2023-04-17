@extends('template')

@section('title', $section->title)
@section('nav') {!! $section->nav() !!} @endsection
@section('path') {!! $section->path() !!} @endsection

@section('content')

<div class="grid grid-cols-3 gap-4">
@foreach($section->pages as $page)
<a href="/{{ $page->fullSlug() }}" class="p-4 shadow-lg">
    <img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="">
    <h2 class="text-xl">{{ $page->title }}</h2>
    {{ $page->abstract }}    
</a>
@endforeach
</div>

@endsection




