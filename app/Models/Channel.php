<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable =[
        'name',
        'slug',
        'uid',
        'user_id',
        'image',
        'description'
    ];

    public function gettRoutKeyName(){
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
