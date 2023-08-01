<?php
class Connection 
{
    public $pdo = null;

    public function __construct()
    {
        try{
            
            $this->pdo = new PDO('mysql:server=localhost;dbname=notes', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo "ERROR: " . $exception->getMessage();
        }
    }

    public function getNotes()
    {
        $statement = $this->pdo->prepare("SELECT * FROM notes ORDER BY date DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    }

return new Connection();