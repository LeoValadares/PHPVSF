<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 5/28/15
 * Time: 1:12 AM
 */

namespace Base\DataMapper;

use Base\Model\AbstractModel as AbstractModel;

require_once __DIR__ . "/../AbstractModel.php";
require_once "IMapperInterface.php";
require_once "IDatabaseAdapterInterface.php";
require_once "QueryBuilder.php";

 class AbstractMapper implements IMapperInterface
{
    protected $databaseTable;
    protected $databaseAdapter;

    function __construct($table, /*IDBAdapterInterface*/ $databaseAdapter)
    {
        $this->databaseTable = $table;
        $this->databaseAdapter = $databaseAdapter;
    }

    public function find($id)
    {
        return $this->databaseAdapter->fetch($id);
    }

    public function findAll(array $parameters = array())
    {
        // TODO: Implement findAll() method.
    }

    public function save(AbstractModel $instance)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractModel $instance)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    //protected abstract function createModelInstance(array $bind);
}