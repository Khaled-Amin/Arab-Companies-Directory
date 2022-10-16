<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Sites extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'site_name',
        'href',
        'category_id',
        'title',
        'countries',
        'keyword',
        'tags',
        'facebook',
        'twitter',
        'instagram',
        'snapchat',
        'youtube',
        'telegram',
        'android',
        'ios'

    ];
    /**
     * Get the user that owns the Sites
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
