<?php class SonicM03 { private $db; private $zonas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaNZ() { $res = $this->db->prepare("SELECT distinct nz as 'nzv' FROM zonas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nzs[] = $c["nzv"]; } return $nzs; }
    } public function sacaZona() { $res = $this->db->prepare("SELECT distinct zona as 'zcv' FROM zonas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $zonas[] = $c["zcv"]; } return $zonas; }
    } public function sacaAparicion() {
        $res = $this->db->prepare("SELECT distinct aparicion1 as 'aparicionv' FROM zonas where aparicion1 != 'No'");
        if ($res->execute()) {while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $apariciones[] = $c["aparicionv"]; } return $apariciones;}
    } public function sacaIsla() { $res = $this->db->prepare("SELECT distinct isla as 'islav' FROM zonas where isla != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $islas[] = $c["islav"]; } return $islas; }
    } public function getNZ() { $res = $this->db->prepare("SELECT * FROM zonas where nz = ?"); $res->bindParam(1, $_POST["nzv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->zonas[] = $c; } return $this->zonas; }
    } public function getZona() { $res = $this->db->prepare("SELECT * FROM zonas where zona = ?"); $res->bindParam(1, $_POST["zcv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->zonas[] = $c; } return $this->zonas; }
    } public function getAparicion() {
        $res = $this->db->prepare("SELECT * FROM zonas where aparicion1 = ?"); $res->bindParam(1, $_POST["aparicionv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->zonas[] = $c; } return $this->zonas; }
    } public function getIsla() { $res = $this->db->prepare("SELECT * FROM zonas where isla = ?"); $res->bindParam(1, $_POST["islav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->zonas[] = $c; } return $this->zonas; }
    }
}

?>
