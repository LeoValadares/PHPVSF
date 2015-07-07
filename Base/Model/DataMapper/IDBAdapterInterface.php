<?php

interface IDBAdapterInterface
{
    public function connect();
    public function disconnect();
    public function prepare($sql, array $parameters = array());
    public function execute(array $parameters = array());
    public function countAffectedRows();
    public function getLastInsertedId($name = null);
    public function fetch();
    public function fetchAll();
    public function select($table, array $parameters = array(), $operand = "AND");
    public function insert($table, array $bind = array());
    public function update($table, array $bind, array $where_parameters = array(), $operand = "AND");
    public function delete($table, array $parameters = array(), $operand = "AND");
}