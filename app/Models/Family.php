<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable =['name','user_id'];

    public function members(){
        return $this->hasMany(FamilyMember::class);
    }
}
