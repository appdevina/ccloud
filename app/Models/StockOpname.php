<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['store_id', 'filename', 'description'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "stock_opnames";

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
