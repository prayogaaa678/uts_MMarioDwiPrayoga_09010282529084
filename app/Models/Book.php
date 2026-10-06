<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'category_id', 'title', 'author', 'publisher', 'year', 'stock',
    ];

    /** Setiap buku dimiliki oleh satu kategori. */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** Bonus: pencarian berdasarkan judul atau penulis. */
    public function scopeSearch($query, ?string $keyword)
    {
        return $query->when($keyword, function ($q) use ($keyword) {
            $q->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('author', 'like', "%{$keyword}%");
            });
        });
    }

    /** Bonus: filter berdasarkan kategori. */
    public function scopeOfCategory($query, $categoryId)
    {
        return $query->when($categoryId, fn ($q) => $q->where('category_id', $categoryId));
    }
}
