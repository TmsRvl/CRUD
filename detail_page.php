<?php
include 'controller.php';
require_once('model.php');

if(isset($_POST['done'])){
    if(!isset($_POST['undo'])){
        $db = new Database();
        //runs the query based on the type of action
        ($_POST['type'] == 'Aggiungi')? 
            $db->insertInto($_POST['nome'], $_POST['cognome'], format($_POST['italiano']), format($_POST['storia']), format($_POST['matematica']), format($_POST['scienze'])) : 
            (($_POST['type'] == 'Modifica')? $db->update($_POST['id'], $_POST['nome'], $_POST['cognome'], format($_POST['italiano']), format($_POST['storia']), format($_POST['matematica']), format($_POST['scienze'])) : 
                $db->delete($_POST['id']));
        header('Location:index.php');
    }else{
        header('Location:index.php'); 
    }
}else{
    printForm($_POST['name'], ($_POST['name'] == 'Aggiungi') ? '' : $_POST['data']);
}

function format($n){
    if($n>10 || $n<0){
        return 0;
    }else{
        return $n;
    }
}

?>

<style>
    <?php
    include 'style.css';
    ?>
</style>