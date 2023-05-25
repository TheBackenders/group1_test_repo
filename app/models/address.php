<?php

namespace app\models;

require_once('basedModels.php');

class Address extends BaseModel
{

    public int $id;
    public string $name_address;

    public function __construct()
    {
        parent::__construct();
    }
}
