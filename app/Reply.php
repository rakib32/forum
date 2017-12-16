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
    protected $fillable = ['content','topic_id', 'parent_reply_id'];

    protected $hidden = ['deleted_at','created_at','updated_at'];

    protected static $rules = [
        'content' => 'required',
        'topic_id' => 'required|exists:topics,id',
        'created_by_user_id' => 'required|exists:users,id'
    ];

    protected static $messages = [
        'required' => 'The :attribute field is required.',
        'exists' => 'The :attribute doesnt exist'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($report) {
            if ( ! $report->isValid()) {
                return false;
            }
        });
    }

    public function isValid()
    {
        $v = Validator::make($this->getAttributes(), static::$rules, static::$messages);

        if($v->fails()){
            $this->errors = $v->messages();
            return false;
        }

        return true;
    }

    public function created_by_user()
    {
        return $this->belongsTo('App\User','created_by_user_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic','topic_id');
    }
}
