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
        if ($this->section_id > 1) {
            $path .= "<a href=\"/{$this->section->slug}\" class=\"hover:underline\">{$this->section->title}</a>  &gt ";
        }
        $path .= $this->title;
        return $path;
    }

    public function fullSlug() 
    {
        return $this->section->slug . '/' . $this->slug ;
    }

    public function rankOptions($rank1)
    {
        $pages = self::orderBy('rank')->get();
        $rank = 1;
        $selected = ($rank == $rank1) ? 'selected' : '';
        $options = "<option value=\"$rank\" $selected>$rank. ==TOP==</option>";;
        $prev = '';
        foreach ($pages as $page) {
            if ($page->rank != $this->rank) {
                $rank++;
                $selected = ($rank == $rank1) ? 'selected' : '';
                $options .= "<option value=\"$rank\" $selected>$rank. AFTER $page->title</option>";
            }
        }
        return $options;
    }

}
