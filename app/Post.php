<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;


    protected $table = 'post';
    
    protected $dates = ['delete_at'];
    protected $fillable = [
        'title',
        'body',
        'is_admin',
        'user_id'
    ];
    protected function user(){
        return $this->belongsTo('App\User');
    }
}
