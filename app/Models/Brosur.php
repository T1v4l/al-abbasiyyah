<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brosur extends Model
{
    protected $table= "brosurs";

    protected $fillable = [
        'image',
        'title',
        'description',
        'list_title',
        'list_1',
        'list_2',
        'list_3',
        'list_4',
    ];
}
