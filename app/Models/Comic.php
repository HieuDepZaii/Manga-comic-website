<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table='comic';
    protected $attributes=[
        'anh_bia'=>'img/default-icon/comic-icon.png',
    ];
}
