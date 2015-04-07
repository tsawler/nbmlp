<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

    public function letters()
    {
        return $this->hasMany('App\Letter');
    }

}
