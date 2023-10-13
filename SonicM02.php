<?php class SonicM02 { private $db; private $seriepelis = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaSeriePeli() { $res = $this->db->prepare("SELECT distinct nombre as 'seriepeliv' FROM seriesypelis");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $seriepeli[] = $c["seriepeliv"]; } return $seriepeli; }
    } public function sacaGenero() {
        $res = $this->db->prepare("SELECT distinct genero1 as 'generov' FROM seriesypelis where genero1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $generos[] = $c["generov"]; }
            $res = $this->db->prepare("SELECT distinct genero2 as 'generov' FROM seriesypelis where genero2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $generos[] = $c["generov"]; } } return $generos;
        }
    } public function sacaTemp() { $res = $this->db->prepare("SELECT distinct temp as 'tempv' FROM seriesypelis where temp != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $temps[] = $c["tempv"]; } return $temps; }
    } public function getSerie() { $res = $this->db->prepare("SELECT * FROM seriesypelis where tipo = 'Serie'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->seriepelis[] = $c; } return $this->seriepelis; }
    } public function getPeli() { $res = $this->db->prepare("SELECT * FROM seriesypelis where tipo = 'Pelicula'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->seriepelis[] = $c; } return $this->seriepelis; }
    } public function getSeriePeli() {
        $res = $this->db->prepare("SELECT * FROM seriesypelis where nombre = ?"); $res->bindParam(1, $_POST["seriepeliv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->seriepelis[] = $c; } return $this->seriepelis; }
    } public function getGenero() { $res = $this->db->prepare("SELECT * FROM seriesypelis where genero1 = ? or genero1 = ?");
        $res->bindParam(1, $_POST["generov"]); $res->bindParam(2, $_POST["generov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->seriepelis[] = $c; } return $this->seriepelis; }
    } public function getTemp() {
        $res = $this->db->prepare("SELECT * FROM seriesypelis where temp = ?"); $res->bindParam(1, $_POST["tempv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->seriepelis[] = $c; } return $this->seriepelis; }
    }
} ?>
