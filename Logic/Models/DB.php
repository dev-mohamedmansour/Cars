<?php
	  
	  namespace Cars\Models;
	  
	  class DB
	  {
			 public $connection;
			 public $query;
			 public $pgsqlLine;
			 
			 // Constructor to connect to PostgreSQL
			 public function __construct()
			 {
					$this->connection = pg_connect(
						 "host=localhost dbname=classic_cars port=5432 user=postgres password=2772003"
					);
			 }
			 
			 // SELECT query
			 public function select($column, $table)
			 {
					$this->pgsqlLine = "SELECT $column FROM \"$table\" ";
					return $this;
			 }
			 
			 // WHERE condition
			 public function where($column, $compare, $value)
			 {
					$this->pgsqlLine = str_replace(";", "", $this->pgsqlLine). " WHERE  $column $compare  '$value' ";
//					$this->pgsqlLine .= " WHERE  $column $compare  '$value' ";
					return $this;
			 }
			 
			 // ORDER BY descending and LIMIT 1
			 public function orderBy($column)
			 {
					$this->pgsqlLine .= " ORDER BY $column DESC LIMIT 1 ";
					return $this;
			 }
			 
			 // Custom ORDER BY ascending
			 public function customOrderBy($column)
			 {
					$this->pgsqlLine .= " ORDER BY $column ASC ";
					return $this;
			 }
			 
			 // GROUP BY and HAVING clause
			 public function groupBy($table1ColumName, $columName, $value)
			 {
					$this->pgsqlLine .= " GROUP BY $table1ColumName HAVING $columName = '$value' ";
					return $this;
			 }
			 
			 // RIGHT JOIN
			 public function rightJoin($table2, $table1ColumnName,
				  $table2ColumnName
			 ) {
					$this->pgsqlLine .= "RIGHT JOIN \"$table2\" on $table1ColumnName = $table2ColumnName ";
					return $this;
			 }
			 
			 // INNER JOIN
			 public function innerJoin($table, $table1ColumnName, $table2ColumnName
			 ) {
					$this->pgsqlLine .= "INNER JOIN \"$table\" on  $table1ColumnName = $table2ColumnName ";
					return $this;
			 }
			 
			 // AND WHERE condition
			 public function andWhere($column, $compare, $value)
			 {
					$this->pgsqlLine .= "AND  $column $compare '$value' ";
					return $this;
			 }
			 
			 // OR WHERE condition
			 public function orWhere($column, $compare, $value)
			 {
					$this->pgsqlLine .= "OR  $column $compare '$value' ";
					return $this;
			 }
			 
			 // INSERT statement
			 public function insert($table, $data)
			 {
					$sql = $this->preparData($data);
					$this->pgsqlLine = " INSERT INTO \"" . $table . "\" " . $sql;
					return $this;
			 }
			 
			 public function preparData($data)
			 {
					$columns = [];
					$values = [];
					
					foreach ($data as $key => $value) {
						  $columns[] = "\"$key\"";
						  
						  if (is_null($value)) {
								 $values[] = 'NULL';
						  } elseif (is_string($value)) {
								 // Escape string values for PostgreSQL
								 $escapedValue = pg_escape_literal(
									  $this->connection, $value
								 );
								 $values[] = $escapedValue;
						  } elseif (is_resource($value)) {
								 // Handle binary data
								 $escapedValue = pg_escape_bytea(
									  $this->connection, stream_get_contents($value)
								 );
								 $values[] = "E'\\x$escapedValue'";
						  } else {
								 // Numeric or other non-string values
								 $values[] = $value;
						  }
					}
					
					$columnsList = implode(", ", $columns);
					$valuesList = implode(", ", $values);
					
					$sql = "($columnsList) VALUES ($valuesList);";
					return $sql;
			 }
			 
			 // After update function
			 public function afterUpdate($sql)
			 {
					$serch = ["(", ")"];
					$removeAdds = str_replace($serch, "", $sql);
					$word ="VALUES";
					$updateSql = str_replace($word,"=",$removeAdds);
					return $updateSql;
			 }
			 
			 // UPDATE statement
			 public function update($table, $data)
			 {
					$sql = $this->preparData($data);
					$newSql = $this->afterUpdate($sql);
					$this->pgsqlLine = "UPDATE \"" . $table . "\"  SET " . $newSql;
					return $this;
			 }
			 
			 // DELETE statement
			 public function delete($table)
			 {
					$this->pgsqlLine = "DELETE  FROM \"$table\"";
					return $this;
			 }
			 
			 // Get all rows from the query
			 public function getAll(): array
			 {
					$this->runQuery();
					while ($rows = pg_fetch_assoc($this->query)) {
						  $response[] = $rows;
					}
					if (empty($response)) {
						  return [0];
					} else {
						  return $response;
					}
			 }
			 
			 // Execute the query
			 public function runQuery()
			 {
					$this->query = pg_query($this->connection, $this->pgsqlLine);

//					echo "<pre>";
//					var_dump($this->pgsqlLine);
//					echo "</pre>";
//					die();
					// Log or output the query for debugging
					if ($this->query === false) {
						  $error = pg_last_error($this->connection);
						  echo "<h2 style='color: red'>Query failed: $error</h2>";
					}
					
					return $this->query;
			 }
			 
			 // Get one row from the query
			 public function getRow()
			 {
					$this->runQuery();
					$q = pg_fetch_assoc($this->query);
					if ($q == []) {
						  echo "<h2 style='color: red'>Data Not Found</h2>";
					} elseif ($q != []) {
						  return $q;
					}
			 }
			 
			 // Execute the query and return result
			 public function execution()
			 {
					$this->runQuery();
					
					// Check if query execution was successful
					if ($this->query === false) {
						  $error = pg_last_error($this->connection);
						  return "<h2 style='color: red'>Query failed: $error</h2>";
					}
					
					// Check the number of affected rows
					if (pg_affected_rows($this->query) > 0) {
						  return "<h2 style='color: green'>All is Done</h2>";
					} else {
						  return "<h2 style='color: orange'>No rows were affected</h2>";
					}
			 }
			 
			 // Destructor to close the PostgreSQL connection
//			 public function __destruct()
//			 {
//					pg_close($this->connection);
//			 }
	  }
