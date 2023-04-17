<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;
    
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function path() 
    {
        $path = '<a href="/" class="hover:underline">Home</a>  &gt; ';
        $path .= "<a href=\"/{$this->section->slug}\" class=\"hover:underline\">{$this->section->title}</a>  &gt ";
        $path .= $this->title;
        return $path;
    }

    public function fullSlug() 
    {
        return $this->section->slug . '/' . $this->slug ;
    }
}
