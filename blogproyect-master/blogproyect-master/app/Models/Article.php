<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function autor():BelongsTo{
        return $this->belongsTo(Autor::class);
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
