<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSize extends Pivot
{
    use SoftDeletes;

    protected $table = 'product_size';
    
    /**
     * size
     *
     */
    public function size()
    {
        return $this->belongsTo(Size::class, 'sizes');
    }
    
    /**
     * product
     *
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'products');
    }
}
