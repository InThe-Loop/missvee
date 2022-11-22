<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Hire extends Model
{
    use SearchableTrait;

    protected $searchable = [
        // column with priorities
        'columns' => [
            'hires.name' => 6,
            'hires.details' => 3,
            'hires.description' => 2,
        ],
    ];

    protected $guarded = [];
}
