<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City_model extends Model
{
    protected $table = "city";

    protected $fillable = ["id", 'name', 'id_province'];
}
