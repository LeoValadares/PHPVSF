<?php

require_once __DIR__ . "/../../configuration.php";
require_once PATH . "/Base/Controller/IControllerInterface.php";
require_once PATH . "/Base/Mapper/IMapperInterface.php";
require_once PATH . "/Base/Model/AbstractModel.php";

class GenericController implements IControllerInterface
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
        include(PATH . "/Public/find.php");
    }

    public function findAll(array $parameters = array())
    {
        $objects = $this->mapper->findAll($parameters);
        include(PATH . "/Public/findAll.php");
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