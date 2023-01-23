<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Chapter;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComicBook extends Model
{
    use HasFactory;

    use Uuids;

    public $incrementing = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comic_books';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'author',
        'artist',
        'description',
        'image',
        'rating',
        'is_featured',
        'is_recommend',
        'is_banner',
    ];

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['search']) && $search = $filter['search']) {
            $query->where('name', 'ILIKE', "%{$search}%")
                  ->orWhere('author', 'ILIKE', "%{$search}%")
                  ->orWhere('artist', 'ILIKE', "%{$search}%")
                  ->orWhere('description', 'ILIKE', "%{$search}%")
                  ->orWhere('mm_name', 'ILIKE', "%{$search}%");
        }
    }

    public function comments(){
        return $this->hasMany( Comment::class);
    }

    public function chapters(){
        return $this->hasMany( Chapter::class);
    }
}
