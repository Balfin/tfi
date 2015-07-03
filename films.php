<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'src/Film.php';
Use AlexLib;

$mysqli = new mysqli('localhost', 'root', 'root', 'films');


if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
$film = new AlexLib\Film($mysqli);
//$film->remove(2);
//$film->modify(3, 'changed name');
//print_r($film->get(3));

switch ($_REQUEST['mode']){
    case 'list':
        $data = $film->getList();
        $html = '';
        foreach($data as $key => $value){
            $html .= '<tr class="dynamic"><td>'.$value['id'].'</td><td>'.$value['film_name'].'</td><td class="remove" id="'.$value['id'].'"> - </td><td class="edit" id="'.$value['id'].'"> e </td></rd></tr>';
        }
        break;
    case 'add':
        $film->add($_POST['film']);
        $html = 'new film was added';
        break;
    case 'remove':
        $film->remove($_POST['film_id']);
        $html = 'film removed';
        break;
    case 'modify':
        break;
    default:
}



$mysqli->close();
echo $html;

