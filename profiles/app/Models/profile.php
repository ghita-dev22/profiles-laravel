<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class Profile extends User
 
    {
        use HasFactory;
        use SoftDeletes;
   
    
        protected $table = 'profile';
    
        protected $dates = ['created_at'];
        protected $fillable = [
            'name',
            'email',
            'password',
            'bio',
            'image',
        ];
        public function getImageAttribute($value)
        {
            return $value ? asset('storage/' . $value) : asset('storage/profile/profile.png');
        }
        public function publications(){
           return  $this->hasMany(publication::class);
        }
        
      
    }
    

