<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['category_id', 'name', 'email', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
