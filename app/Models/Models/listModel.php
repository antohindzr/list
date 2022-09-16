<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listModel extends Model
{
    use HasFactory;
    protected $table = "listuser";
    public $timestamps = false;

    protected $fillable = [
        'fio',
        'email',
        'number'
    ];
}
