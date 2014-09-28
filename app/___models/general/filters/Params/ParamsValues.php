<?php

namespace UpfModels;

/*** Params Values***/
class ParamsValues extends General {
    protected $table = 'params_values';

    public function paramData()
    {
        return $this->hasOne('UpfModels\Params','id','param_id');
    }
}
