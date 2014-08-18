<?php

class Category extends Eloquent{

    /* protected $table = 'Category'; If the name is different, we can define here*/
    public function tbltodotasks()
    {
        return $this->hasMany('tbltodotask');
    }


}