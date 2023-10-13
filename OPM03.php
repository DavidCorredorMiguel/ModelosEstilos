<?php class OPM03 { private $db; private $lugares = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaMar() { $res = $this->db->prepare("SELECT distinct mar as 'tipov' FROM geografia");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc1' FROM geografia where mar='East Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc2' FROM geografia where mar='North Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc3' FROM geografia where mar='South Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc4' FROM geografia where mar='West Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc5' FROM geografia where mar='Red Line'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc6' FROM geografia where mar='Calm Belt'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc7' FROM geografia where mar='Paradise'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc8' FROM geografia where mar='Nuevo Mundo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(mar) as 'totalc9' FROM geografia where mar='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(subtipolugar) as 'totalc10' FROM geografia where subtipolugar='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    } public function c11() {
        $res = $this->db->prepare("SELECT count(subtipolugar) as 'totalc11' FROM geografia where subtipolugar='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c11[] = $c["totalc11"];}return $c11; }
    } public function getMar() { $res = $this->db->prepare("SELECT * FROM geografia where mar = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    } public function getLugaresCanon() { $res = $this->db->prepare("SELECT * FROM geografia where subtipolugar='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    } public function getLugaresNoCanon() { $res = $this->db->prepare("SELECT * FROM geografia where subtipolugar='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    }
}
?>
