<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LetterDetail extends Model {

    public function letter_id()
    {
        return $this->belongsTo('Letter');
    }

}
