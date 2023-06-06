<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'src', 
        'mime_type'
    ];
    
    /**
     * product
     *
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
