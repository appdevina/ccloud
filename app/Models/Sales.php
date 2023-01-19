<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['store_id', 'filename', 'unit_sold', 'imei', 'alamat'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "sales";

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
