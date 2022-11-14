<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mail extends Model
{
    use HasFactory;

    protected $table='mail';

    public $fillable =
        [
            'name','email','subject','reply','check','message'

        ];

}
