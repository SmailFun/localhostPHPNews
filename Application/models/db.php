<?php
namespace Application\Models;

use mysqli;

class DataBase
    {
        protected mysqli $conn;

        protected  string $sqlQuery;

        protected bool $isGetResul = false;

        public function __construct()
        {
            $this->conn = new mysqli(DB_SERVER_NAME, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ($this->conn->connect_error)
                die("Connection failed: " . $this->conn->connect_error);
        }

        public function select( ...$columns): Database
        {
            $this->isGetResul = true;

            $stringOfColumns = implode(', ', $columns);

            $this->sqlQuery = "SELECT $stringOfColumns ";
            return $this;
        }

        public function insert(string $nameTable, array $columns): Database
        {
            $stringOfColumns = implode(', ', array_keys($columns));
            $stringOfValues =  implode("', '", $columns);

            $this->sqlQuery = "INSERT INTO $nameTable ($stringOfColumns) VALUES ('$stringOfValues')";

            return $this;
        }

        public function update(string $nameTable): Database
        {
            $this->sqlQuery = "UPDATE $nameTable ";
            return $this;
        }

        public function delete(string $nameTable): Database
        {
            $this->sqlQuery = "DELETE FROM $nameTable ";
            return $this;
        }

        public function from( ...$nameTable): Database
        {
            $stringOfTable = implode(', ', $nameTable);

            $this->sqlQuery .= "FROM $stringOfTable ";

            return $this;
        }

        public function join(string $type, string $nameTable, string $linkCondition) : Database
        {
            $this->sqlQuery .= "$type JOIN $nameTable ON $linkCondition ";
            return $this;
        }

        public function where(string $condition): Database
        {
            $this->sqlQuery .= " WHERE $condition ";
            return $this;
        }

        public function set(array $columnsAndValues): Database
        {
            $stringOfColumnsAndValues = 'SET ';
            foreach ($columnsAndValues as $key => $value) {
                $stringOfColumnsAndValues .= "$key = '$value', ";
            }
            $stringOfColumnsAndValues[-2] = ' ';
            $this->sqlQuery .=$stringOfColumnsAndValues . ' ';

            return $this;
        }

        public function groupBy(...$column): Database
        {
            $stringOfColumn = implode(', ', $column);
            $this->sqlQuery .= " GROUP BY $stringOfColumn ";
            return $this;
        }

        public function orderBy(...$column): Database
        {
            $stringOfColumn = implode(', ', $column);
            $this->sqlQuery .= " ORDER BY $stringOfColumn ";
            return $this;
        }

        public function perform(): array
        {
            //echo $this->sqlQuery;
            $resultData = [];
            $resultQuery = $this->conn->query($this->sqlQuery);

            if($this->isGetResul) {
                while ($row = $resultQuery->fetch_assoc()) {
                    $resultData[] = $row;
                }
            }
            return $resultData;
        }



}