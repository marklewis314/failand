@extends('template')

@section('title', 'Search Results')
@section('nav') {!! $section->nav() !!} @endsection
@section('path', '')

@section('content')

<div class="text-xl pl-2">Search results for <b>'{{ $q }}'</b>:</div>

@if($pages->count())

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4">
@foreach($pages as $page)
<a href="/{{ $page->fullSlug() }}" class="p-4 shadow-lg border rounded-lg">
    <img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="">
    <h2 class="text-xl mb-2">{{ $page->title }}</h2>
    {!! $page->abstract !!}
</a>
@endforeach
</div>

@else

<div class="p-2">No results.</div>

@endif

@endsection


