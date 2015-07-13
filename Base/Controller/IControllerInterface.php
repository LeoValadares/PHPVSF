<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 6/15/15
 * Time: 6:10 PM
 */
interface IControllerInterface
{
    public function home();
    public function find($id);
    public function findAll(array $parameters = array());
    public function save();
    public function update($id);
    public function delete($id);
}