<?php

namespace App\Repository;

class BaseRepository {
    protected $obj;

    protected function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function find($id)
    {
        // TODO implement find

        return $this->obj->find($id);
    }

    public function findByColumn(string $column, $value): object
    {
        return $this->obj->where($column, $value)->get();
    }    
}