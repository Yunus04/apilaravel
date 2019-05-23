<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Item extends Model
{
    protected $fillable = ['user_id', 'product_name','description','price'];

    public function scopeLatesFirst($query){
    	return $query->orderBy('id', 'DESC');
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
