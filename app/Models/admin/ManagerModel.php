<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerModel extends Model
{
    use HasFactory;
    protected $table = 'managers';
    public $timestamps = false;
}
