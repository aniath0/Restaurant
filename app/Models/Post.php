<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         "libelle",
          "description",
        ];

    
    public function getuser() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
