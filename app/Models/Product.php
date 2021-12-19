<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function setImageAttribute($value)
    {
        // strip the url and take only the path
        $path = ltrim($value, url('/') . 'storage/');

        // check if the path is not empty
        if (!empty($path)) {
            $this->attributes['image'] = $path;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
