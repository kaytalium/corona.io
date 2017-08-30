<?php

class DatabaseConnection{

	private $host="corona7210.db.7195088.44e.hostedresource.net";
	private $username="corona7210";
	private $password="hteOM@89kdj45dfjs92";
	private $database="corona7210";

	public $connection;
	public $data;
	public $dataArray;

	function connectToDatabase()

	{
		date('M',date(''));
		try {
		$conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
		}
		catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}	

		$connection=$conn;
		return $this->connection;
	}

	/**
	 * This method uses a prepared statement to execute queries. This method is safer than direct queries as it
	 * prevents sql injection
	 **/
	function executeStatementReturnResult($query, $paramArray)
	{
        try 
        {
            $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($query);
            $stmt->execute($paramArray);
            $i=0;

            while($row = $stmt->fetch()) {
                $array[$i]=$row;
                $i++;
            }
        } 
        catch(PDOException $e)
        {
			echo 'ERROR: ' . $e->getMessage();
		}

        if(!empty($array))
        {
            $this->dataArray=$array;
            return $this->dataArray;
        }else{
            return "";
        }
    }

	
	function queryDatabaseReturnResultset($query)
	{
		try{
			$conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$data = $conn->query($query);
            $i=0;

			foreach($data as $row) {
			$array[$i]=$row;
			$i++;
			}
        }
		catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

        $this->dataArray=$array;	
		return $this->dataArray;
    }

	
    function CRUDData($query,$paramArray)
	{
        try{ 
            $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare($query);
			$stmt->execute($paramArray);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

		return $conn->lastInsertId();
	}

      
    function upData($query,$paramArray)
	{
		try{ 
			$conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare($query);
			$stmt->execute($paramArray);
            //$number_of_rows = $stmt->fetchColumn(); 
        } catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

		return $stmt->rowCount();
    }

	
    function executesql($query)
    {
        $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->query($query);
        return 'update successfully';
    }

}