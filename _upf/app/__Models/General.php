<?php

namespace UpfModels;

class General extends \Eloquent {
    public $Filter = [];

    /*** Relation Meta ***/
    public function Meta()
    {
        return $this->hasOne('UpfModels\MetaData','id','meta_id');
    }

    /*** Relation Comments ***/
    public function Comments()
    {
            return $this->hasMany('UpfModels\Comments','wall_id','comments_id');
    }
}
