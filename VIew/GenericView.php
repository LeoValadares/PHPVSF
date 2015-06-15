<?php

require_once __DIR__ . "/../configuration.php";
require_once PATH . "/View/IViewInterface.php";
require_once PATH . "/Presenter/IMapperInterface.php";
require_once PATH. "/Model/AbstractModel.php";

class GenericView implements IViewInterface
{
    private $model;
    private $mapper;

    public function __construct(/*AbstractModel $model,*/ IMapperInterface $mapper)
    {
        //$this->model = $model;
        $this->mapper = $mapper;
    }

    public function home()
    {

    }

    public function find($id)
    {
        print_r($this->mapper->find($id));
    }

    public function findAll(array $parameters = array())
    {
        print_r($this->mapper->findAll($parameters));
    }

    public function save(AbstractModel $instance)
    {
        // TODO: Implement save() method.
    }

    public function update(AbstractModel $instance)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}