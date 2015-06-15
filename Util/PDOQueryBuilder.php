<?php

//disabling strict warnings due to use of php function end
error_reporting(E_ALL & ~E_STRICT);

final class PDOQueryBuilder
{

    public static function select($table, array $parameters = array(), $operand = "AND")
    {
        $where = null;                                  //where clauses will be concatenated in this string
        if(!empty($parameters))
        {
            foreach ($parameters as $key => $value)
            {
                if (end(array_keys($parameters)) == $key)
                {
                    $where .= "$key = :$key";
                }
                else
                {
                    $where .= "$key = :$key $operand ";
                }
            }
        }
        return "SELECT * FROM " . $table . ($where == null ? "" : " WHERE $where");
    }

    public static function insert($table, array $bind = array())
    {
        $keys = implode(", ", array_keys($bind));
        //the values here are the keys with ":" before so you can bind the data on pdo->execute
        $values = implode(", ", array_map(function ($value) { return ":" . $value . ""; }, array_keys($bind)));
        return "INSERT INTO $table ($keys) VALUES ($values)";
    }

    public static function update($table, array $bind, array $parameters = array(), $operand = "AND")
    {
        $set = null;                                    //set clause will be concatenated to this string
        foreach ($bind as $key => $value)               //creates SQL set part of query string
        {
            if (end(array_keys($bind)) == $key)
            {
                $set .= "$key = '$value'";
            }
            else
            {
                $set .= "$key = '$value', ";
            }
        }

        $where = null;                                  //where clause will be concatenated to this string
        foreach ($parameters as $key => $value)         //creates SQL where part of query string
        {
            if (end(array_keys($parameters)) == $key)
            {
                $where .= "$key = '$value'";
            }
            else
            {
                $where .= "$key = '$value' $operand ";
            }
        }

        return "UPDATE $table SET " . $set . ($where == null ? "" : " WHERE $where");
    }

    public static function delete($table, array $parameters = array(), $operand = "AND")
    {
        $where = null;                                  //where clause will be concatenated to this string
        foreach ($parameters as $key => $value)         //creates SQL where part of query string
        {
            if (end(array_keys($parameters)) == $key)
            {
                $where .= "$key = :$key";
            }
            else
            {
                $where .= "$key = :$key $operand ";
            }
        }

        return "DELETE FROM $table" . ($where == null ? "" : " WHERE $where");
    }
}