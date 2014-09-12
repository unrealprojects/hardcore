<?php

namespace Model\General;

class General extends \Eloquent {
    public $timestamps = false;
    public $rewrite;
    /* Связь с Мета Данными */
    public function metadata()
    {
        return $this->hasOne('Model\General\MetaData','id','metadata_id');
    }

    /* Связь с Комментариями */
    public function comments()
    {
        return $this->hasMany('Model\General\Comments','list_id','comments_id');
    }
}
