<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * Scopes a query to only include active records.
     *
     * @param  mixed  $query  The query parameter.
     * @return mixed The return value.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Generates a thumbnail attribute for the vendor image.
     *
     * @return Attribute The generated thumbnail attribute.
     */
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

    /**
     * Generates an icon thumbnail attribute, falling back to the regular thumbnail.
     *
     * @return Attribute The generated icon thumbnail attribute.
     */
    public function iconThumbnail(): Attribute
    {
        $iconThumbnail = $this->thumbnail;
        if ($this->icon_image && Storage::exists($this->icon_image)) {
            $iconThumbnail = Storage::url($this->icon_image);
        }

        return Attribute::make(
            get: fn () => $iconThumbnail
        );
    }
}
