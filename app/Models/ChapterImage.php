<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChapterImage extends Model
{
    use HasFactory;
    use Uuids;

    public $incrementing = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chapter_images';

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
        'chapter_id',
        'image',
    ];

    public function scopeFilter($query, $filter)
    {
       
    }

    public function chapter(){
        return $this->belongsTo( Chapter::class);
    }
}
