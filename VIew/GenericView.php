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
        $object = $this->mapper->find($id);
        include (PATH . "/Public/find.php");
    }

    public function findAll(array $parameters = array())
    {
        $objects = $this->mapper->findAll($parameters);
        include (PATH . "/Public/findAll.php");
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