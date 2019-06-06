<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:38
 * Project: e-commerce
 */

class Database
{
    /**
     * DB Connection property
     */
    private $db;

    /**
     * Statemnet property
     */
    private $stmt;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

        } catch (PDOException $e) {
            abort(500, 'Database connection fail!<br>' . $e->getMessage(), 'Database connection fail!', $e->getTraceAsString());
        }
    }

    /**
     * Create a statement
     */
    public function query($query)
    {
        $this->stmt = $this->db->prepare($query);
    }
    
    /**
     * Bind parameter to statement
     */
    public function bind($parameter, $value, $type = NULL)
    {
        if( is_null($type) ) {
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    /**
     * Execute the statement
     */
    public function execute()
    {
        $this->stmt->execute();
    }

    /**
     * Retrieve all result
     */
    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve the first result
     */
    public function first()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Count total rows
     */
    public function countRows($table = '', $where_key = '', $where_value = '')
    {
        if (! empty($where_key)) {
            $this->query("SELECT COUNT(1) AS 'row_count' FROM `$table` WHERE $where_key = $where_value");
        } else {
            $this->query("SELECT COUNT(1) AS 'row_count' FROM `$table`");
        }
        return $this->first()['row_count'];
    }

    /**
     * Return count of affected rows
     */
    public function affectedRows()
    {
        return $this->stmt->rowCount();
    }

    /**
     * Return the last insert ID
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}