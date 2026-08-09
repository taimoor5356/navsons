<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class CategoryBanner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function thumbnail(): Attribute
    {
        $thumbnail = asset('default/default.jpg');
        if ($this->image && Storage::exists($this->image)) {
            $thumbnail = Storage::url($this->image);
        }

        return Attribute::make(
            get: fn () => $thumbnail
        );
    }
}
