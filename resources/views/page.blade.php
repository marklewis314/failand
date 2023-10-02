@extends('template')

@section('title', $page->title)
@section('nav') {!! $page->section->nav() !!} @endsection
@section('path') {!! $page->path() !!} @endsection

@section('content')
   
<div class="">
@if($page->image)
<img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="md:w-1/2 mb-4 rounded-lg">
@endif
<div class="content">
{!! $page->content !!}
</div>
</div>

<p class="my-4"><a href="/{{ $page->section->slug }}" class="text-lg hover:underline">&lArr; @if($page->section->id > 1)All @endif {{ $page->section->title }}</a></p>

@endsection




