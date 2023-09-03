@extends('template')

@section('title', $page->title)
@section('nav') {!! $page->section->nav() !!} @endsection
@section('path') {!! $page->path() !!} @endsection

@section('content')

<div class="">
@if($page->image)
<img src="/{{ $page->image }}" alt="{{ $page->alt }}" class="md:w-1/2 mb-4 rounded-lg">
@endif

@if(session('sent'))

<div class="bg-lime-300  border-lime-700 p-4 rounded">Your message has been sent</div>

@else

<form method="POST" class="grid grid-cols-1 md:w-1/2">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}" id="name">
    <label for="email" class="mt-2">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" id="email">
    <label for="message" class="mt-2">Message</label>
    <textarea name="message" id="message" rows="8">{{ old('mesage') }}</textarea>
    <div class="mt-4">
        <button type="submit" class="bg-lime-700 text-white px-4 py-1.5 rounded">Send</button>
        <a href="/" class="bg-stone-400 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>

@endif

</div>

<p class="my-4"><a href="/{{ $page->section->slug }}" class="text-lg hover:underline">&lArr; @if($page->section->id > 1)All @endif {{ $page->section->title }}</a></p>

@endsection




