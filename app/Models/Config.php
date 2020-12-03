<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    use FullTextSearch;

    protected $table = "config";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'scope',
        'value',
        'active'
    ];

    protected $searchable = [
        '`scope`'
    ];

    public $timestamps = false;

    public function jobs()
    {
        return $this->hasMany('App\Models\Jobs', 'project', 'scope');
    }
}
