<?php class OPM04 { private $db; private $recompensas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipoRec() { $res = $this->db->prepare("SELECT distinct tiporec as 'tipov' FROM recompensas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tiporec) as 'totalc1' FROM recompensas where tiporec='Activa'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tiporec) as 'totalc2' FROM recompensas where tiporec='Inactiva'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(tiporec) as 'totalc3' FROM recompensas where tiporec='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(tiporec) as 'totalc4' FROM recompensas where tiporec='Perdonada'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(subtiporec) as 'totalc5' FROM recompensas where subtiporec='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(subtiporec) as 'totalc6' FROM recompensas where subtiporec='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function getRecompensas() {
        $res = $this->db->prepare("SELECT * FROM recompensas where tiporec = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->recompensas[] = $c; } return $this->recompensas; }
    } public function getRecCanon() { $res = $this->db->prepare("SELECT * FROM recompensas where subtiporec='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->recompensas[] = $c; } return $this->recompensas; }
    } public function getRecNoCanon() { $res = $this->db->prepare("SELECT * FROM recompensas where subtiporec='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->recompensas[] = $c; } return $this->recompensas; }
    }
}
?>
