<?php

require_once __DIR__ . "/../configuration.php";
require_once PATH . "/Presenter/IMapperInterface.php";
require_once PATH . "/Model/AbstractModel.php";
require_once PATH . "/Model/DataMapper/IDBAdapterInterface.php";

class ModelMapper implements IMapperInterface
{
    protected $databaseTable;
    protected $databaseAdapter;

    function __construct($table, IDBAdapterInterface $databaseAdapter)
    {
        $this->databaseTable = $table;
        $this->databaseAdapter = $databaseAdapter;
    }

    public function find($id)
    {
        $this->databaseAdapter->connect();
        $this->databaseAdapter->select($this->databaseTable, ["id" => $id]);
        $fetched = $this->databaseAdapter->fetch();
        $this->databaseAdapter->disconnect();
        return $fetched;
    }

    public function findAll(array $parameters = array())
    {
        $this->databaseAdapter->connect();
        $this->databaseAdapter->select($this->databaseTable, $parameters);
        $fetched = $this->databaseAdapter->fetchAll($this->databaseTable, $parameters);
        $this->databaseAdapter->disconnect();
        return $fetched;
    }

    public function save(AbstractModel $instance)
    {
        if (!($instance instanceof AbstractModel)) {
            throw new Exception("Cannot save objects that aren't AbstractModel instances");
        }
        $this->databaseAdapter->connect();
        $this->databaseAdapter->insert($this->databaseTable, $instance->toArray());
        $insertedId = $this->databaseAdapter->getLastInsertedId();

        return $insertedId;
    }

    public function update(AbstractModel $instance)
    {
        $this->databaseAdapter->connect();
        $this->databaseAdapter->update($this->databaseTable, $instance->toArray(), ["id" => $instance->getId()]);
        $this->databaseAdapter->disconnect();
    }

    public function delete($id)
    {
        $this->databaseAdapter->connect();
        $this->databaseAdapter->delete($this->databaseTable, ["id" => $id]);
        $affectedRowsCount = $this->databaseAdapter->countAffectedRows();
        $this->databaseAdapter->disconnect();

        return $affectedRowsCount;
    }
}