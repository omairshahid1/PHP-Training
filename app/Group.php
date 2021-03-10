<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'name' 
    ]; 
    public function users() 
    {
        return $this->belongsToMany(GroupUser::class, 'group_user','group_id','user_id');     
    }
}
 