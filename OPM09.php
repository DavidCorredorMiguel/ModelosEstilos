<?php class OPM09 { private $db; private $razas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaRazas() {
        $res = $this->db->prepare("SELECT distinct tiporaza as 'tipov' FROM razas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tiporaza) as 'totalc1' FROM razas where tiporaza='Natural'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tiporaza) as 'totalc2' FROM razas where tiporaza='Hibrida'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(tiporaza) as 'totalc3' FROM razas where tiporaza='Artificial'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(subtiporaza) as 'totalc4' FROM razas where subtiporaza='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(subtiporaza) as 'totalc5' FROM razas where subtiporaza='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function getRazas() {
        $res = $this->db->prepare("SELECT * FROM razas where tiporaza = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->razas[] = $c; } return $this->razas; }
    } public function getRazasCanon() { $res = $this->db->prepare("SELECT * FROM razas where subtiporaza='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->razas[] = $c; } return $this->razas; }
    } public function getRazasNoCanon() { $res = $this->db->prepare("SELECT * FROM razas where subtiporaza='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->razas[] = $c; } return $this->razas; }
    }
}
?>
