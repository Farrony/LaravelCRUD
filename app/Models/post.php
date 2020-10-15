<?php

namespace App\Models;

use App\Rules\Uppercase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class post extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','title','slug','description'];

    public const VALADATION_RULES = [
        'title' => ['required','string','unique:posts,title'],
        'category_id' => ['required','integer'],
        'description' => ['required'],
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
