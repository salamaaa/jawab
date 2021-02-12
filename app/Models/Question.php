<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute(){
        return route('questions.show',$this->id);
    }

    public function getStatusAttribute(){
        if($this->answers_count > 0 ){
            if ($this->best_answer_id){
                return 'bg-green-500 border text-white';
            }
            return 'p-1 border-2 border-green-500 text-green-500';
        }
        return 'border-none';
    }
}
