<?php class OPM17 { private $db; private $tecnicas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaArmaEstiloC() { $res = $this->db->prepare("SELECT distinct armaestiloc as 'armaestilocv' FROM tecnicas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $armaestiloc[] = $c["armaestilocv"]; } return $armaestiloc; }
    } public function sacaTipoEstiloC() { $res = $this->db->prepare("SELECT distinct tipoestiloc as 'tipoestilocv' FROM tecnicas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipoestiloc[] = $c["tipoestilocv"]; } return $tipoestiloc; }
    } public function sacaSubTEstC1() {
        $res = $this->db->prepare("SELECT distinct subtipoestiloc1 as 'subtipoestiloc1v' FROM tecnicas where subtipoestiloc1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtestc1[] = $c["subtipoestiloc1v"]; } return $subtestc1; }
    } public function sacaSubTEstC2() {
        $res = $this->db->prepare("SELECT distinct subtipoestiloc2 as 'subtipoestiloc2v' FROM tecnicas where subtipoestiloc2!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtestc2[] = $c["subtipoestiloc2v"]; } return $subtestc2; }
    } public function sacaFruta() {
        $res = $this->db->prepare("SELECT distinct tipofruta as 'tipov' FROM tecnicas where tipofruta!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaSubtipo() {
        $res = $this->db->prepare("SELECT distinct subtipofruta as 'subtipov' FROM tecnicas where subtipofruta!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtipos[] = $c["subtipov"]; } return $subtipos; }
    } public function sacaNombre() { $res = $this->db->prepare("SELECT distinct nfruta as 'nombrev' FROM tecnicas where nfruta!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nombres[] = $c["nombrev"]; } return $nombres; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1' FROM tecnicas where tcanon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc2' FROM tecnicas where tcanon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function getArmaEstiloC() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where armaestiloc = ?"); $res->bindParam(1, $_POST["armaestilocv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getTipoEstiloC() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where tipoestiloc = ?"); $res->bindParam(1, $_POST["tipoestilocv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getSubTEstC1() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where subtipoestiloc1 = ?"); $res->bindParam(1, $_POST["subtipoestiloc1v"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getSubTEstC2() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where subtipoestiloc2 = ?"); $res->bindParam(1, $_POST["subtipoestiloc2v"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getSubtiposAp() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where subtipoap = ?"); $res->bindParam(1, $_POST["subtipoapv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getFrutas() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where tipofruta = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getSubtipos() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where subtipofruta = ?"); $res->bindParam(1, $_POST["subtipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getNombreFrutas() {
        $res = $this->db->prepare("SELECT * FROM tecnicas where nfruta = ?"); $res->bindParam(1, $_POST["nombrev"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getFMostradas() { $res = $this->db->prepare("SELECT * FROM tecnicas where mostrada!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getTecnicasCanon() { $res = $this->db->prepare("SELECT * FROM tecnicas where tcanon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getTecnicasNoCanon() { $res = $this->db->prepare("SELECT * FROM tecnicas where tcanon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getFrutasCanon() { $res = $this->db->prepare("SELECT * FROM tecnicas where cfruta='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    } public function getFrutasNoCanon() { $res = $this->db->prepare("SELECT * FROM tecnicas where cfruta='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->tecnicas[] = $c; } return $this->tecnicas; }
    }
} ?>