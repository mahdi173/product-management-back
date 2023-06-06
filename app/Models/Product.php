<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'type_id',
        'user_id',
        'photo_id'
    ];  
    
    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'type_id',
        'user_id',
        'photo_id',
        'deleted_at'
    ];
    
    /**
     * type
     *
     */
    public function type(){
        return $this->belongsTo(Type::class);
    }
    
    /**
     * user
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * photo
     *
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }   
    
    /**
     * sizes
     *
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')
                    ->wherePivotNull('deleted_at');
    }
}
