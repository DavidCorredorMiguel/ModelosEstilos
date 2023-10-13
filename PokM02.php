<?php class PokM02 { private $db; private $pokemon = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipo() { $res = $this->db->prepare("SELECT distinct tipo1 as 'tipov' FROM evoluciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaMetodoEv1() {
        $res = $this->db->prepare("SELECT distinct metodoev1 as 'metodoev1v' FROM evoluciones where metodoev1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $metodosev1[] = $c["metodoev1v"]; } return $metodosev1; }
    } public function sacaMetodoEv2() {
        $res = $this->db->prepare("SELECT distinct metodoev2 as 'metodoev2v' FROM evoluciones where metodoev2!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $metodosev2[] = $c["metodoev2v"]; } return $metodosev2; }
    } public function c1() { $res = $this->db->prepare("SELECT count(ev1) as 'totalc1' FROM evoluciones where ev1='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"]; } return $c1; }
    } public function c2() { $res = $this->db->prepare("SELECT count(ev1) as 'totalc2' FROM evoluciones where ev1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"]; } return $c2; }
    } public function c3() { $res = $this->db->prepare("SELECT count(ev2) as 'totalc3' FROM evoluciones where ev2='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"]; } return $c3; }
    } public function c4() { $res = $this->db->prepare("SELECT count(ev2) as 'totalc4' FROM evoluciones where ev2!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"]; } return $c4; }
    } public function getTipo() {
        $consulta = "SELECT * FROM evoluciones where tipo1 = ? or tipo2 = ? or tp1ev1 = ? or tp2ev1 = ? or tp1ev2 = ? or tp2ev2 = ?";
        $res = $this->db->prepare($consulta); $tipo = $_POST["tipov"]; $res->bindParam(1, $tipo); $res->bindParam(2, $tipo);
        $res->bindParam(3, $tipo); $res->bindParam(4, $tipo); $res->bindParam(5, $tipo); $res->bindParam(6, $tipo);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getMetodosEv1() {
        $res = $this->db->prepare("SELECT * FROM evoluciones where metodoev1 = ?"); $res->bindParam(1, $_POST["metodoev1v"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getMetodosEv2() {
        $res = $this->db->prepare("SELECT * FROM evoluciones where metodoev2 = ?"); $res->bindParam(1, $_POST["metodoev2v"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getSinEv() { $res = $this->db->prepare("SELECT * FROM evoluciones where ev1 = 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getFormasReg() {
        $res = $this->db->prepare("SELECT * FROM evoluciones where fr!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    }
}

?>
