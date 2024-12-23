<?php
	  
	  namespace Cars\Models;
	  
	  //	 	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  
	  class DB
	  {
			 public $connection;
			 public $query;
			 public $mysqlLine;
			 
			 public function __construct()
			 {
					$this->connection = mysqli_connect(
						 'localhost', 'root', '', 'classic_cars'
					);
			 }
			 
			 public function select($column, $table)
			 {
					$this->mysqlLine = "SELECT $column FROM `$table` ";
					
					return $this;
			 }
			 
			 public function where($column, $compare, $value)
			 {
					$this->mysqlLine .= " WHERE  $column $compare '$value' ";
					
					return $this;
			 }
			 
			 public function orderBy($column)
			 {
					$this->mysqlLine .= " ORDER BY `$column` DESC LIMIT 1 ";
					
					return $this;
			 }
			 
			 public function customOrderBy($column)
			 {
					$this->mysqlLine .= " ORDER BY  $column ASC ";
					
					return $this;
			 }
			 
			 public function groupBy($table1ColumName, $columName, $value)
			 {
					$this->mysqlLine .= " GROUP BY $table1ColumName " . " " .
						 " HAVING" . " " . "`$columName` =  '$value' ";
					
					return $this;
			 }
			 
			 public function rightJoin(
				  $table2,
				  $table1ColumnName,
				  $table2ColumnName
			 ) {
					$this->mysqlLine .= "RIGHT JOIN `$table2` on $table1ColumnName  = $table2ColumnName ";
					
					return $this;
			 }
			 
			 public function innerJoin(
				  $table,
				  $table1ColumnName,
				  $table2ColumnName
			 ) {
					$this->mysqlLine .= "INNER JOIN  `$table` on $table1ColumnName  = $table2ColumnName ";
					
					return $this;
			 }
			 
			 public function andWhere($column, $compare, $value)
			 {
					$this->mysqlLine .= "AND `$column` $compare '$value' ";
					
					return $this;
			 }
			 
			 public function orWhere($column, $compare, $value)
			 {
					$this->mysqlLine .= "OR `$column` $compare '$value' ";
					
					return $this;
			 }
			 
			 public function insert($table, $data)
			 {
					$sql = $this->preparData($data);
					$this->mysqlLine = "INSERT INTO `$table` SET $sql";
					
					return $this;
			 }
			 
			 public function preparData($data)
			 {
					$sql = "";
					foreach ($data as $key => $values) {
						  $sql .= " `$key` = " . ((gettype($values) == 'string')
									 ? " '$values' " : " $values ") . " ,";
					}
					$sql = rtrim($sql, ",");
					
					return $sql;
			 }
			 
			 public function update($table, $data)
			 {
					$sql = $this->preparData($data);
					$this->mysqlLine = " UPDATE `$table` SET $sql";
					
					return $this;
			 }
			 
			 public function delete($table)
			 {
					$this->mysqlLine = " DELETE FROM `$table`";
					
					return $this;
			 }
			 
			 public function getAll(): array
			 {
					$this->runQuery();
					while ($rows = mysqli_fetch_assoc($this->query)) {
						  $response[] = $rows;
					}
					
					/** @var $response */
					return $response;
			 }
			 
			 public function runQuery()
			 {
					$this->query = mysqli_query(
						 $this->connection,
						 $this->mysqlLine
					);
					
					return $this->query;
			 }
			 
			 public function getRow()
			 {
					$this->runQuery();
					$q = mysqli_fetch_assoc($this->query);
					if ($q == []) {
						  echo "<h2 style='color: red'>Data Not Found</h2>";
					} elseif ($q != []) {
						  return $q;
					}
			 }
			 
			 public function execution()
			 {
					$this->runQuery();
					if (mysqli_affected_rows($this->connection) > 0) {
						  return "<h2 style='color: green'>All is Done</h2>";
					} else {
						  return "something error";
					}
			 }
			 
			 public function __destruct()
			 {
					mysqli_close($this->connection);
			 }
			 
	  }