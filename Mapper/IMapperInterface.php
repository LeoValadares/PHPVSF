<?php

require_once __DIR__ . "/../configuration.php";
require_once PATH . "/Model/AbstractModel.php";

interface IMapperInterface
{
    public function find($id);
    public function findAll(array $where_clauses = array());
    public function save(AbstractModel $instance);
    public function update(AbstractModel $instance);
    public function delete($id);
}