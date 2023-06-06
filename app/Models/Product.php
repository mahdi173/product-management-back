<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
    
    /**
     * scopeFilter
     *
     * @param  mixed $query
     * @param  ?array $filters
     * @return mixed
     */
    public function scopeFilter(mixed $query, ?array $filters): mixed
    {
        if(is_array($filters)){
            foreach ($filters as $filter => $value) {
                switch ($filter) {
                    case 'id':
                        $query->where('id',$value);
                        break;
                    case 'name':
                        $query->where(DB::raw('lower(name)'),'like','%'.strtolower($value).'%');
                        break;
                    case 'price':
                        $price= explode(",", $value);
                        $query->whereBetween('price', [$price[0], $price[1]]);
                        break;
                    case 'type':
                        $query->whereHas("type", function ($query) use ($value) {
                            $query->where(DB::raw('lower(name)'), 'like', '%'. strtolower($value).'%');
                        });
                        break;
                    case 'sizes': 
                        $query->whereHas("sizes", function ($query) use ($value) {
                            $query->whereIn("size_id", json_decode($value));
                        });  
                        break;
                    default:
                        $query->where('user_id', auth()->user()->id)->with('type', 'photo', 'sizes')->orderby('created_at', 'DESC');
                        break;
                }
            }
        }

        return $query->where('user_id', auth()->user()->id)->with('type', 'photo', 'sizes')->orderby('created_at', 'DESC');
    }
}
