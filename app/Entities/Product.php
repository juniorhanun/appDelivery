<?php

namespace Delivery\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'img',
        'status',
    ];

    /**
     * Método category
     * Responsavel por fazer o relacionamento com a Entidade Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

