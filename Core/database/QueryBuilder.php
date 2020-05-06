<?php

class QueryBuilder{

    protected PDO $pdo;
    protected $query;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function select($columns, $table){

        $this->query .= "SELECT "; 

        foreach ($columns as $column) {

            if($columns[array_key_last($columns)] != $column){
                $this->query .= $column . ', ';
            }else{
                $this->query .= $column;
            }
        }
        $this->query .= " FROM {$table}";  
        return $this;
    }

    public function orderBy($column, $sort)
    {
        $this->query .= " ORDER BY {$column} {$sort}";
        return $this;
    }
    
    protected function execute($pdoOption){

        $stmt = $this->db->query($this->query);
        $this->query = "";
        return $stmt->fetchAll($pdoOption);
    }

    public function where($column, $value, $operator = '=')
    {
        $this->query .= " where {$column} {$operator} '{$value}'";
        return $this;
    }


    public function get()
    {
        // echo '<pre>';
        // die(var_dump($this->query));
        // echo '</pre>';
       return $this->execute(PDO::FETCH_ASSOC);
    }
}