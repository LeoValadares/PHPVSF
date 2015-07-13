<?php

require_once __DIR__ . "/../../configuration.php";
require_once PATH . "/Base/Controller/IControllerInterface.php";
require_once PATH . "/Base/Util/Database/PDOAdapter.php";
require_once PATH . "/Base/Mapper/IMapperInterface.php";
require_once PATH . "/Base/Mapper/ModelMapper.php";
require_once PATH . "/Base/Model/AbstractModel.php";
require_once PATH . "/Public/Models/Carro.php";
require_once PATH . "/Base/Util/Login/LoginController.php";

class CarroController implements IControllerInterface
{
    private $model;
    private $mapper;
    private $loginManager;

    public function __construct()
    {
        $pdoAdapter = new PDOAdapter(new ReflectionClass("Carro"), DB_FQDN, DB_USER, DB_PASSWORD);
        $this->mapper = new ModelMapper("Carro", $pdoAdapter);
        $this->loginManager = new LoginController();
    }

    public function home()
    {
        $pageName = __CLASS__;
        include(PATH . "/Public/Views/home.php");
    }

    public function find($id)
    {
        $object = $this->mapper->find($id);
        include(PATH . "/Public/Views/find.php");
    }

    public function findAll(array $parameters = array())
    {
        $objects = $this->mapper->findAll($parameters);
        include(PATH . "/Public/Views/findAll.php");
    }

    public function save()
    {
        $this->loginManager->login();
        if(isset($_POST['modelo']) && !empty($_POST['modelo']))
        {
            $carroToSave = new Carro();
            $carroToSave->setModelo($_POST['modelo']);
            $this->mapper->save($carroToSave);
            $this->find($this->mapper->getLastInsertedId());
        }
        else
        {
            include(PATH . "/Public/Views/addCarro.php");
        }
    }

    public function update($id)
    {
        $this->loginManager->login();
        if(isset($_POST['id']) && isset($_POST['modelo']) && !empty($_POST['id']) && !empty($_POST['modelo']))
        {
            $carroToUpdate = new Carro();
            $carroToUpdate->setId($_POST['id']);
            $carroToUpdate->setModelo($_POST['modelo']);
            $this->mapper->update($carroToUpdate);
            $object = $carroToUpdate;
            include(PATH . "/Public/Views/find.php");
        }
        else
        {
            $object = $this->mapper->find($id);
            include(PATH . "/Public/Views/update.php");
        }
    }

    public function delete($id)
    {
        $this->loginManager->login();
        $this->mapper->delete($id);
        header("Location: http://localhost/phpvsf/CarroController/findAll");
    }
}