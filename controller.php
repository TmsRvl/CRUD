<?php 
include 'model.php';

function printTable(){
    $db = new Database();
    $table = $db->selectAll();
    $firstIteration = true;
    
    foreach ($table as $arr) {
        if($firstIteration){
            echo '<tr>';
            foreach ($arr as $key => $value) {
                if(!is_numeric($key)){
                    echo '<th>' . ucfirst($key) . '</th>';
                    $firstIteration = false;
                }
            }
            echo '<th colspan="3"> Azioni </th>';
            echo '</tr>';
        }
        echo '<tr>';
        $buff = null;
        foreach ($arr as $key => $value) {
            if(!is_numeric($key)){
                echo '<td>' . $value . '</td>';
                $buff .= $value . ',';
            }
        }
        echo createBtn('Visualizza', $buff);
        echo createBtn('Modifica', $buff);
        echo createBtn('Cancella', $buff);
        echo '</tr>';
    }
}

function createBtn($name, $data){
    return '<td>
        <form action="detail_page.php" method="post">
            <input type="submit" value="'.$name.'" name="name">
            <input type="text" name="data" value="'.$data.'" hidden>
        </form>
    </td>';
}

function printForm($name, $data){
    $db = new Database();
    $type = ($name == 'Aggiungi') ? 0 : (($name == 'Modifica') ? 1 : 2 );
    $elm = ($type != 0) ? explode(',', $data) : ''; 
    $keys = $db->getKeys();

    echo '<div><h1>'.$name.'</h1>
    <form action="detail_page.php" method="post" autocomplete="off">';
    for ($i=0; $i < sizeof($keys); $i++) { 
        echo createInput($keys[$i], ($type != 0) ? $elm[$i] : '', $type). '<br>';
    }
    echo ($name != 'Visualizza') ? '<input type="submit" value="'. $name .'">' : '';
    echo '<input type="submit" name="undo" value="Annulla">'
    . '<input type="text" name="done" hidden>'
    . '<input type="text" name="type" value="'.$name.'" hidden>'
    . '</form></div>';
}

function createInput($name, $info, $type){
    if($type != 2 && $name == 'id'){
        return '<input type="text" value="'.$info.'" name="'.$name.'" hidden>';
    }
    switch ($type) {
        case '0': //add
            return '<label>'.ucfirst($name).'</label>
                <input type="text" name="'.$name.'">';
            break;
        case '1': //update
            return '<label>'.ucfirst($name).'</label>
                <input type="text" value="'.$info.'" name="'.$name.'">';
            break;
        case '2': //view and delete
            return '<label>'.ucfirst($name).'</label>
                <input type="text" value="'.$info.'" name="'.$name.'" readonly>';
            break;
        default:
            return '';
            break;
    }
}
?>