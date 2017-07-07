<?php

namespace App\Models;


class Page extends Model
{
  public function get() {

        $data = Role::pluck('name', 'id');
        return $data;
  }
}
