<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class cars extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable =[
        'carTitle',
        'price',
        'description',
        'image',
        'published',
        'category_id',
    ];
    //اسم عادي بشتغل جوه ال view 
    public function category(){
        //اسم الموديل
        return $this->belongsTo(Category::class);
    }
}
