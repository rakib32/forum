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
    protected $fillable = ['title','content','category_id'];

    protected $hidden = ['deleted_at','created_at','updated_at'];

    protected static $rules = [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
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

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
