<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Autor extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    protected $table = 'autors';
    protected $guarded=[];
    protected $appends=['initials'];

    public function articles():HasMany{
        return $this->hasMany(Article::class,'autor_id');
    }

    public function getInitialsAttribute(){
        $names=explode(' ',$this->nombre);
        $initials='';

        foreach ($names as $name){
            $initials.=strtoupper($name[0]);
        }
        return $initials;
    }
    
}
