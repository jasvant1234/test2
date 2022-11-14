<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanksmail extends Model
{
    use HasFactory;

    protected $table='thanks_mail';

    public $fillable =
    [
        'name','email','subject','reply','check'

    ];

}
