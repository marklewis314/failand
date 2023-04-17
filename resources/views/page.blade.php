@extends('template')

@section('title', $page->title)
@section('nav') {!! $page->section->nav() !!} @endsection
@section('path') {!! $page->path() !!} @endsection

@section('content')
   
<div class="my-4">
@if($page->image)
<img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="">
@endif

{!! nl2br($page->content) !!}
</div>

<p><a href="/{{ $page->section->slug }}" class="text-lg hover:underline">&lArr; All {{ $page->section->title }}</a></p>

@endsection




