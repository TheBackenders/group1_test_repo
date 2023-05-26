<?php

namespace app\models;

require_once __DIR__."/basedmodel.php";

class AddressModel extends BaseModel
{

    public int $id;
    public string $name_address;

    public function __construct()
    {
        parent::__construct();
    }
}
