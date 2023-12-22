<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|true $is_completed
 * @property string $name
 * @property integer $id
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'is_completed',
    ];

}
