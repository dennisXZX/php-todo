<?php

class QueryBuilder {
	protected $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

    /**
     * @summary select all entries
     * @param $table - string represents the database table name
     * @param $intoClass - string represents the class name that each query result is matched to
     * @return database query results
     */
	public function selectAll($table, $intoClass) {
		// prepare an SQL statement
		$sql = "SELECT * FROM {$table}";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
	}

    /**
     * @summary insert data into database
     * @param $table - string represents the database table name
     * @param $parameters - an array containing the database column names
     */
	public function insert($table, $parameters) {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            // bind the parameters to replace placeholders and execute the SQL statement
            $statement->execute($parameters);
        } catch (Exception $e) {
            // die($e->getMessage());
            die('Whoops, something went wrong');
        }

    }
}