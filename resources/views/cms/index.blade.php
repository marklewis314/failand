@extends('cms.template')

@section('title', 'CMS')

@section('content')

<div class="mb-4">
<a href="/cms/pages" class="block hover:underline">Pages</a>
</div>
<div class="mb-4">
<a href="/cms/images" class="block hover:underline">Images</a>
</div>

<a href="/admin" class="block hover:underline">&lArr; Admin</a>
<a href="/" class="block hover:underline">&lArr; Main site</a>

@endsection




