<?php

namespace App\Repositories;

use Config;

abstract class Repository{

    protected $model = FALSE;

    public function get($id){

        if($id == null){

            $builder = $this->model->select('*');

        }
        else{
            $builder = $this->model->select('*')->where('id', $id);
        }
        return $builder->get();
    }
}

?>