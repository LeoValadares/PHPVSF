<?php

require_once __DIR__ . "/../../configuration.php";
require_once PATH . "/Base/Controller/IControllerInterface.php";
require_once PATH . "/Base/Util/Database/PDOAdapter.php";
require_once PATH . "/Base/Mapper/IMapperInterface.php";
require_once PATH . "/Base/Mapper/ModelMapper.php";
require_once PATH . "/Base/Model/AbstractModel.php";
require_once PATH . "/Public/Models/Carro.php";
require_once PATH . "/Public/Controllers/LoginController.php";

class CarroController implements IControllerInterface
{
    private $model;
    private $mapper;
    private $loginManager;

    public function __construct()
    {
        $pdoAdapter = new PDOAdapter(new ReflectionClass("Carro"), DB_FQDN, DB_USER);
        $this->mapper = new ModelMapper("Carro", $pdoAdapter);
        $this->loginManager = new LoginController();
    }

    public function home()
    {

    }

    public function find($id)
    {
        $this->loginManager->login();
        $object = $this->mapper->find($id);
        include(PATH . "/Public/Views/find.php");
    }

    public function findAll(array $parameters = array())
    {
        $objects = $this->mapper->findAll($parameters);
        include(PATH . "/Public/Views/findAll.php");
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