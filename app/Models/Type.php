<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
        
    /**
     * products
     *
     */
    public function products(){
        return $this->hasMany(Product::class);
    }
}
