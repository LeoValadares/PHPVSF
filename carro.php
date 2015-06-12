<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 6/3/15
 * Time: 6:32 PM
 */

require_once "Model/AbstractModel.php";
use Base\Model\AbstractModel as AbstractModel;

class carro extends AbstractModel{
    private $id;
    private $modelo;

    public function toArray()
    {
        // TODO: Implement toArray() method.
    }
}