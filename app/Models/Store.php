<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['store_name', 'address'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function stockOpname()
    {
        return $this->hasMany(StockOpname::class);
    }

    public function visibilities()
    {
        return $this->hasMany(Visibility::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
