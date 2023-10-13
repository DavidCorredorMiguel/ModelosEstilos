<?php class OPM07 { private $db; private $bandaspiratas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipoGrupo() { $res = $this->db->prepare("SELECT distinct tiposdegrupos as 'tipogv' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipog[] = $c["tipogv"]; } return $tipog; }
    } public function sacaTipoMiembro() { $res = $this->db->prepare("SELECT distinct tipomiembro as 'tipomv' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipom[] = $c["tipomv"]; } return $tipom; }
    } public function sacaTituloGrupo() { $res = $this->db->prepare("SELECT distinct titulogrupo as 'titulogv' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $titulog[] = $c["titulogv"]; } return $titulog; }
    } public function sacaEstado() { $res = $this->db->prepare("SELECT distinct estado as 'estadov' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $estado[] = $c["estadov"]; } return $estado; }
    } public function sacaGrupo() { $res = $this->db->prepare("SELECT distinct grupo as 'gv' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $g[] = $c["gv"]; } return $g; }
    } public function sacaBarco() { $res = $this->db->prepare("SELECT distinct barco as 'barcogv' FROM bandaspiratas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $barcog[] = $c["barcogv"]; } return $barcog; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(estado) as 'totalc1' FROM bandaspiratas where estado='Activa'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(estado) as 'totalc2' FROM bandaspiratas where estado='Inactiva'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(estado) as 'totalc3' FROM bandaspiratas where estado='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(canon) as 'totalc4' FROM bandaspiratas where canon='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(canon) as 'totalc5' FROM bandaspiratas where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(muerte) as 'totalc6' FROM bandaspiratas where muerte!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function getTipoGrupo() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where tiposdegrupos = ?"); $res->bindParam(1, $_POST["tipogv"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getTipoMiembro() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where tipomiembro = ?"); $res->bindParam(1, $_POST["tipomv"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getTituloGrupo() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where titulogrupo = ?"); $res->bindParam(1, $_POST["titulogv"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getMuerte() { $res = $this->db->prepare("SELECT * FROM bandaspiratas where muerte!='No'");
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getEstado() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where estado = ?"); $res->bindParam(1, $_POST["estadov"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getGrupo() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where grupo = ?"); $res->bindParam(1, $_POST["gv"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getBarco() {
        $res = $this->db->prepare("SELECT * FROM bandaspiratas where barco = ?"); $res->bindParam(1, $_POST["barcogv"]);
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getGPiratasCanon() { $res = $this->db->prepare("SELECT * FROM bandaspiratas where canon='Si'");
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    } public function getGPiratasNoCanon() { $res = $this->db->prepare("SELECT * FROM bandaspiratas where canon='No'");
        if ($res->execute()){while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->bandaspiratas[] = $c;}return $this->bandaspiratas; }
    }
}
?>