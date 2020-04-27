<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }


}
