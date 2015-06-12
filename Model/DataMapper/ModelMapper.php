<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 5/28/15
 * Time: 1:12 AM
 */

namespace Base\DataMapper;

use Base\Model\AbstractModel as AbstractModel;

require_once PATH . "/../AbstractModel.php";
require_once PATH . "IMapperInterface.php";
require_once PATH . "IDatabaseAdapterInterface.php";

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
        $this->databaseAdapter->select($this->databaseTable);
        $fetched = $this->databaseAdapter->fetch($this->databaseTable, $id);
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
        $this->databaseAdapter->connect();
        $this->databaseAdapter->insert($this->databaseTable, $instance->toArray());
        $lastInsertId = $this->databaseAdapter->getLastInsertedId();
        return $lastInsertId;
    }

    public function update(AbstractModel $instance)
    {
        $this->databaseAdapter->connect();
        $this->databaseAdapter->update($this->databaseTable, $instance->toArray());
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