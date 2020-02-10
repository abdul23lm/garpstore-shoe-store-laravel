<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province_model extends Model
{
    protected $table = "province";

    protected $fillable = ["id", 'name'];
}
