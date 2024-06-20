<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Record extends Model
{
    use HasFactory;
     protected $attributes = [
        'category_id' => 1,
        'user_id'=>1,
        'weight'=>70,
        'date'=>0401,
    ];

    protected $fillable = [
        'memo',
        'category_id',
        'user_id',
        'weight',
        'date',
        
];
    
    
    public function category()
{
    return $this->belongsTo(Category::class);
}

 public function user()
{
    return $this->belongsTo(User::class);
}


}
