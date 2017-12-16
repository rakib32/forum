<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Topic extends Model
{
    use SoftDeletes;
    protected $table = 'topics';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'content', 'category_id', 'created_by_user_id'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $appends = ['count_replies'];

    public function created_by_user()
    {
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply', 'topic_id');
    }

    public function setRepliesCountAttribute($value)
    {
        $this->attributes['replies_count'] = Carbon::createFromFormat('m/d/Y', $value)->toDateString();
    }

    public function getCountRepliesAttribute()
    {
        return ($this->replies ? $this->replies->count() : 0);
    }
}
