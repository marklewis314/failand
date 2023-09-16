<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Section extends Model
{
    use HasFactory;

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class)->orderBy('rank');
    }
    
    public function options() 
    {
        $sections = self::orderBy('rank')->get();
        $options = '';
        foreach ($sections as $section) {
            $selected = ($section->id == $this->id) ? 'selected' : '';
            $options .= "<option value=\"$section->id\" $selected>$section->title</option>";
        }
        return $options;
    }

    public function nav() 
    {
        $sections = self::orderBy('rank')->get();
        $nav = '';
        foreach ($sections as $section) {
            $class = ($section->id == $this->id) ? 'underline' : 'hover:underline';
            $nav .= "<a href=\"/$section->slug\" class=\"$class\">$section->title</a>";
        }
        return $nav;
    }
    
    public function path() 
    {
        $path = '<a href="/" class="hover:underline">Home</a>  &gt; ';
        $path .= $this->title;
        return $path;
    }
}
