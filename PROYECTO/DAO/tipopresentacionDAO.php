<?php
require_once('../DAL/DBAccess.php');
require_once('../BOL/tipopresentacion.php');
class tipopresentacionDAO
{
	private $pdo;
	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->get_connection();
	}
	public function Registrar(tipopresentacion $tipopresentacion)
	{
		try
		{
		$statement = $this->pdo->prepare("CALL insertar_tipopresentacion(?)");
		$statement->bindParam(1,$tipopresentacion->__GET('Descripcion'));
    $statement -> execute();
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
