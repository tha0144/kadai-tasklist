<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['content', 'status', 'user_id'];
    
    // タスク投稿者を取得
    public function user(){
        return $this->belongsTo(User::class);
    }
}
