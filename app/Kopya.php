<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kopya extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];
}
