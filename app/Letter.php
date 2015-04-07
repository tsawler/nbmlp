<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model {

    public function author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }

    public function pages()
    {
        return $this->hasMany('App\LetterDetail')->orderBy('sort_order');
    }

}
