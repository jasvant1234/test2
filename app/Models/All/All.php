<?php


namespace App\Models\All;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All extends Model
{
    use HasFactory, Likeable;
    use HasFactory;
    protected $table = 'all';
    protected $fillable =[
        'gender','category','product_image','shipping_charge','product_name','product_price','Likes','Unlikes','product_size','product_descreption'
    ];


}
