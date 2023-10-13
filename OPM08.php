<?php class OPM08 { private $db; private $lugares = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipoEspecie() {
        $res = $this->db->prepare("SELECT distinct tipoespecie as 'tipov' FROM especies");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc1' FROM especies where tipoespecie='Global'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc2' FROM especies where tipoespecie='East Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc3' FROM especies where tipoespecie='South Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc4' FROM especies where tipoespecie='West Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc5' FROM especies where tipoespecie='Red Line'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc6' FROM especies where tipoespecie='Paradise'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc7' FROM especies where tipoespecie='Nuevo Mundo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(tipoespecie) as 'totalc8' FROM especies where tipoespecie='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(subtipoespecie) as 'totalc9' FROM especies where subtipoespecie='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(subtipoespecie) as 'totalc10' FROM especies where subtipoespecie='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    } public function getTipoEspecie() {
        $res = $this->db->prepare("SELECT * FROM especies where tipoespecie = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    } public function getEspeciesCanon() { $res = $this->db->prepare("SELECT * FROM especies where subtipoespecie='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    } public function getEspeciesNoCanon() { $res = $this->db->prepare("SELECT * FROM especies where subtipoespecie='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->lugares[] = $c; } return $this->lugares; }
    }
}
?>
