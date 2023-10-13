<?php class OPM02 { private $db; private $haki = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaHaki() {
        $consulta = "SELECT distinct tiposdehaki as 'tipov' FROM haki";
        $res = $this->db->prepare($consulta);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(idtipohaki) as 'totalc1' FROM haki where idtipohaki=1");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(idtipohaki) as 'totalc2' FROM haki where idtipohaki=2");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(idtipohaki) as 'totalc3' FROM haki where idtipohaki=3");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(tipousuario) as 'totalc4' FROM haki where tipousuario='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(tipousuario) as 'totalc5' FROM haki where tipousuario='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function getHaki() {
        $res = $this->db->prepare("SELECT * FROM haki where tiposdehaki = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->haki[] = $c; } return $this->haki; }
    } public function getHakiCanon() { $res = $this->db->prepare("SELECT * FROM haki where tipousuario='Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->haki[] = $c; } return $this->haki; }
    } public function getHakiNoCanon() { $res = $this->db->prepare("SELECT * FROM haki where tipousuario='No Canon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->haki[] = $c; } return $this->haki; }
    }
}
?>
