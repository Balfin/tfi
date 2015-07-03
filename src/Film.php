<?php
namespace AlexLib;
class Film
{
    private $mysqli;
    public function __construct(\mysqli $mysqli){
        $this->mysqli = $mysqli;
    }

    protected function query($query){
        return $this->mysqli->query($query);
    }

    public function add($film_name){
        $this->query('insert into films(film_name) values ("'.$film_name.'")');
    }

    public function get($id){
        $result = $this->query('select * from films where id = "'.intval($id).'"');
        return mysqli_fetch_assoc($result);
    }

    public function remove($id){
        $this->query('delete from films where id = "'.intval($id).'"');
    }

    public function modify($id, $film_name = ''){
        $this->query('update films set film_name = "'.$film_name.'" where id = '.intval($id));
    }

    public function getList($limit = 0, $offset = 0){
        $sql = 'select * from films';
        $limit ? $sql = $sql.' limit '.intval($limit) : '';
        ($limit && $offset) ? $sql = $sql.' offset '.intval($limit) : '';
        $result = $this->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}