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
        if ($this->section->slug) {
            return $this->section->slug . '/' . $this->slug;
        } else {
            return $this->slug;
        }
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

    public function imgTag()
    {
        $content = $this->content;
        if (preg_match('#[^/](images/[-\w]+\.\w+)#', $content, $matches)) {
            foreach ($matches as $match) {
                $image = Image::where('image', $match)->first();
                if ($image) {
                    $content = str_replace($match, "<img src=\"/$match\" alt=\"$image->alt\">", $content);
                }
            }
            $this->content = $content;
        }
    }

    public function urlTag()
    {
        $this->content = preg_replace('#[^">](https?://[-\w\./]+)#', '<a href="\1" target="' . $this->section->slug . '">\1</a>', $this->content);
    }

    public function paras()
    {
        $this->content = preg_replace('/(.*)\r\n\r\n/', '<p>\1</p>' . "\r\n\r\n", $this->content);
    }

    public function xparas()
    {
       return preg_replace('#<p>(.*)</p>#', '\1', $this->content);
    }

}
