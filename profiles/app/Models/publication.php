<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class publication extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'publications';
    
 
        protected $fillable = [
            'titre',
            'body',
            'image',
            'profile_id',
        ];

    public function profile(){
      return  $this->belongsTo(Profile::class,'profile_id');
    }
}
