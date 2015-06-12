<?php

namespace Base\DataMapper;

use Base\Model\AbstractModel as AbstractModel;
require_once "../../configuration.php";
require_once PATH . "/Model/DataMapper/AbstractMapper.php";

interface IMapperInterface
{
    public function find($id);
    public function findAll(array $where_clauses = array());
    public function save(AbstractModel $instance);
    public function update(AbstractModel $instance);
    public function delete($id);
}