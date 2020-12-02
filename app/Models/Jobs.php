<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    use FullTextSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'project',
        'type',
        'environment',
        'key',
        'status',
        'log',
        'notes'
    ];

    protected $searchable = [
        'filename',
        'project',
        '`type`',
        '`key`'
    ];

    protected $dates = ['processed_at'];

}
