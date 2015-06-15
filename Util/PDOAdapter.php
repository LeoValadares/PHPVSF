<?php

require_once __DIR__ . "/../configuration.php";
require_once PATH ."/Util/PDOQueryBuilder.php";
require_once PATH . "/Model/DataMapper/IDBAdapterInterface.php";
require_once PATH .  "/Util/PDOQueryBuilder.php";

class PDOAdapter implements IDBAdapterInterface
{
    private $mappedModelClass = null;
    protected $config = array();
    protected $connection;
    protected $fetchMode = PDO::FETCH_CLASS;
    protected $statement;

    public function __construct(ReflectionClass $mappedModelClass, $dsn, $username = null,
                                $password = null, array $driverOptions = array())
    {
        if($mappedModelClass == null)
        {
            throw new Exception("Can't create class with null Model");
        }
        $this->mappedModelClass = $mappedModelClass;
        $this->config = compact("dsn", "username", "password",
            "driverOptions");
    }

    public function connect()
    {
        if(empty($this->connection))
        {
            $this->connection = new PDO(
                $this->config["dsn"],
                $this->config["username"],
                $this->config["password"],
                $this->config["driverOptions"]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(
                PDO::ATTR_EMULATE_PREPARES, false);
        }
    }

    public function disconnect()
    {
        $this->connection = null;
    }

    /* You can use the prepare class directly instead of explicitly connecting to the
     * database using the connect() function. It's advised that you use the proper
     * select(), insert(), update() and delete() methods for these types of queries
     * to maintain the framework's domain logic.
     */
    public function prepare($sql, array $parameters = array())
    {
        $this->statement = $this->connection->prepare($sql, $parameters);
        $this->statement->setFetchMode($this->fetchMode, $this->mappedModelClass->getName());
    }

    public function execute(array $parameters = array())
    {
        $this->statement->execute($parameters);
    }

    public function countAffectedRows()
    {
        return $this->statement->rowCount();
    }

    public function getLastInsertedId($name = null)
    {
        return $this->connection->lastInsertId($name);
    }

    /**
     * Get single object of the data retrieved by the database
     * @return array $objectArray Returns single object of the expected class
     */
    public function fetch()
    {
        return $this->statement->fetch();
    }

    /**
     * Get all the data retrieved from the database as an array of the desired class
     * @return array $objectArray Returns all the results as an array of the expected class
     */
    public function fetchAll()
    {
        $objectArray = [];
        while($fetchedObject = $this->fetch())
        {
            $objectArray[] = $fetchedObject;
        }

        return $objectArray;
    }
    /**
     * This function selects data with where parameters passed as associative arrays into the specified table
     * @param String $table Name of the table in which the query will be executed
     * @param array $parameters The parameters that will be the where clause as an associative array where the key is the parameter and the value is
     * parameter's value to be inserted like: ["parameter1" => "parameter1 value", "parameter2" => "parameter2 value", ...].
     * If no $parameters are passed this function will execute a select in the whole table.
     */
    public function select($table, array $parameters = array(), $operand = "AND")
    {
        $this->prepare(PDOQueryBuilder::select($table, $parameters, $operand));
        foreach ($parameters as $key => $value)
        {
            $key = ":" . $key;
        }

        $this->execute($parameters);
    }

    /**
     * This function inserts data passed as associative arrays into the specified table
     * @param String $table Name of the table in which the query will be executed
     * @param array $bind The data to be inserted as an associative array where the key is the parameter and the value is
     * parameter's value to be inserted like: ["parameter1" => "parameter1 value", "parameter2" => "parameter2 value", ...].
     */
    public function insert($table, array $bind = array())
    {
        $this->prepare(PDOQueryBuilder::insert($table, $bind));
        foreach ($bind as $key => $value)
        {
            $key = ":" . $key;
        }

        $this->execute($bind);
    }

    /**
     * This function executes a update in the specified table by passing associative arrays as the SET and WHERE clauses.
     * @param String $table Name of the table in which the query will be executed
     * @param array $bind The data that will be set in the query. The parameter and the values should be informed in an
     * associative array where the parameter is the name of the parameter and the value is the parameter's value that
     * will be set like: ["parameter1" => "parameter1 value", "parameter2" => "parameter2 value", ...].
     * @param array $where_parameters The values that will be used as the where clause for limiting the update query where
     * the parameter is the array key and the parameter value is the array value like:
     * ["parameter1" => "parameter1 value", "parameter2" => "parameter2 value", ...].
     */
    public function update($table, array $bind, array $where_parameters = array(), $operand = "AND")
    {
        $this->prepare(PDOQueryBuilder::update($table, $bind, $where_parameters, $operand));
        $this->execute();
    }

    public function delete($table, array $parameters = array(), $operand = "AND")
    {
        $this->prepare(PDOQueryBuilder::delete($table, $parameters, $operand));
        $this->execute($parameters);
    }
}