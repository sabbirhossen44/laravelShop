<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Brand extends Model
{
    protected $guarded = ['id'];

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function thumbnail(): Attribute
    {
        $src = asset('default.webp');
        if ($this->media && Storage::exists($this->media?->src)) {
            $src = Storage::url($this->media->src);
        }
        return Attribute::make(
            get: fn () => $src,
        );
    }

    protected static function boot(){
        parent::boot();

        static::creating(function($brand){
            if (empty($brand->slug)) {
                $baseSlug = Str::slug($brand->name);
                $slug = $baseSlug;
                $count = 1;
                while(Brand::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $brand->slug = $slug;
            } else {
                $brand->slug = Str::slug($brand->name);
            }

        });
    }
}
