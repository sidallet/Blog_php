<?php
class Connection extends PDO
{

	private $stmt;

	#créer une instance de Connexion nécessite un DataSourceName ($dsn), un nom d'utilisateur ($username) et un mot de passe ($password).
	#pour cee projet, ces variables globales sont définies dans config.php
	public function __construct(string $dsn, string $username, string $password)
	{
		parent::__construct($dsn,$username,$password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}


	/** * @param string $query
		   * @param array $parameters *
		   * @return bool Returns `true` on success, `false` otherwise
	*/

	#exécute dans la BD la requête $query en lui donnant les paramètres définis dans $parameters.
	#retourne le résultat d'exécution de la requête.
	public function executeQuery(string $query, array $parameters = [])
	{
		$this->stmt = parent::prepare($query);
		foreach ($parameters as $name => $value)
		{
		 $this->stmt->bindValue($name, $value[0], $value[1]);
		}
		return $this->stmt->execute();
	}

	public function getResults()
	{
	 return $this->stmt->fetchall();
	}

	public function getCount()
	{
		return $this->stmt->rowCount();
	}
}

?>
