<?php

class tbltodotask extends Eloquent{

    /* protected $table = 'tbltodotask'; If the name is different, we can define here*/

    public static $key = 'ID';
    public function Category()
    {
        return $this->belongsTo('Category');
    }


}