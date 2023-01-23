<?php
class Database{
    private $pdo;
    private $table = 'classe_5id';

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=registro", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("ERRORE: Impossibile stabilire una connessione al database");
        }   
    }

    function selectAll(){
        $sql = 'SELECT * FROM '.$this->table.'';
        return $this->pdo->query($sql);
    }

    function insertInto($nome, $cognome, $italiano, $storia, $matematica, $scienze){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO ".$this->table." (id, nome, cognome, italiano, storia, matematica, scienze) 
            VALUES (:id, :nome, :cognome, :italiano, :storia, :matematica, :scienze)");
            $stmt->bindValue(':id', 0);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cognome', $cognome);
            $stmt->bindValue(':italiano', $italiano);
            $stmt->bindValue(':storia', $storia);
            $stmt->bindValue(':matematica', $matematica);
            $stmt->bindValue(':scienze', $scienze);
            $stmt->execute();
        } catch (PDOException $e) {
            die("ERRORE: Impossibile eseguire l'operazione nel database");
        }
    }

    function update($id, $nome, $cognome, $italiano, $storia, $matematica, $scienze){
        try {
            $stmt = $this->pdo->prepare("UPDATE ".$this->table." SET nome=:nome, cognome=:cognome,
             italiano=:italiano, storia=:storia, matematica=:matematica, scienze=:scienze WHERE id=:id");
             $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cognome', $cognome);
            $stmt->bindValue(':italiano', $italiano);
            $stmt->bindValue(':storia', $storia);
            $stmt->bindValue(':matematica', $matematica);
            $stmt->bindValue(':scienze', $scienze);
            $stmt->execute();
        } catch (PDOException $e) {
            die("ERRORE: Impossibile eseguire l'operazione nel database");
        }
    }

    function delete($id){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id=:id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("ERRORE: Impossibile eseguire l'operazione nel database");
        }
    }

    function getKeys(){
        $table = $this->selectAll();
        $keys;
        foreach ($table as $arr) {
            foreach ($arr as $key => $value) {
                if(!is_numeric($key))
                    $keys[] = $key;
            }
            break;
        }
        return $keys;
    }
}