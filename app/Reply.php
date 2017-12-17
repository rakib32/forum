<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Reply extends Model
{
    use SoftDeletes;
    protected $table = 'replies';
    protected $guarded = ['id'];
    protected $fillable = ['content', 'topic_id', 'created_by_user_id', 'parent_reply_id'];

    protected $hidden = ['deleted_at','created_at','updated_at'];

    public function created_by_user()
    {
        return $this->belongsTo('App\User','created_by_user_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic','topic_id');
    }
}
