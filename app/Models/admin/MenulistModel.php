<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenulistModel extends Model
{
    use HasFactory;
    protected $table = 'menulist';
    public $timestamps = false;
}
