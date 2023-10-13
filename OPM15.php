<?php class OPM15 { private $db; private $limiterelacion = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaLimitacion() { $res = $this->db->prepare("SELECT distinct limitacion as 'limitev' FROM limiterelacion");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtiposap[] = $c["limitev"]; } return $subtiposap; }
    } public function sacaSubTL(){ $res = $this->db->prepare("SELECT distinct subtl1 as 'subtlv'FROM limiterelacion where subtl1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtl[] = $c["subtlv"]; } return $subtl; }
    } public function sacaFruta() { $res = $this->db->prepare("SELECT distinct tipofruta as 'tipov' FROM limiterelacion");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaSubtipo() { $res = $this->db->prepare("SELECT distinct subtipofruta as 'subtipov' FROM limiterelacion");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtipos[] = $c["subtipov"]; } return $subtipos; }
    } public function sacaNombre() { $res = $this->db->prepare("SELECT distinct nfruta as 'nombrev' FROM limiterelacion");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nombres[] = $c["nombrev"]; } return $nombres; }
    } public function c() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc' FROM limiterelacion where tipofruta='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cd[] = $c["totalc"]; } return $cd; }
    } public function c0() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc0' FROM limiterelacion where tipofruta='Logia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c0[] = $c["totalc0"];}return $c0; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1'FROM limiterelacion where tipofruta='Zoan'
            and subtipofruta='Normal' or usuario='Rob Lucci'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c1b() {
        $res = $this->db->prepare("SELECT count(tipofruta) as'totalc1b'FROM limiterelacion where tipofruta='Zoan'
            and subtipofruta='Especial' or subtipofruta='Prehistorica' or subtipofruta='Mitologica'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1b[] = $c["totalc1b"];}return $c1b; }
    } public function c1c() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1c' FROM limiterelacion where tipofruta='Zoan'
            and subtipofruta='Desconocida'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1c[] = $c["totalc1c"];}return $c1c; }
    } public function c1d() {
        $res = $this->db->prepare("SELECT count(tipofruta)as 'totalc1d'FROM limiterelacion where usuario='Kozuki Momonosuke'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1d[] = $c["totalc1d"];}return $c1d; }
    } public function c1e() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1e' FROM limiterelacion where modelo='Efectiva'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1e[] = $c["totalc1e"];}return $c1e; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc2' FROM limiterelacion where tipofruta='Paramecia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(mostrada) as 'totalc3' FROM limiterelacion where mostrada!='No' and canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(mostrada) as 'totalc4' FROM limiterelacion where mostrada!='No' and canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc5' FROM limiterelacion where canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc6' FROM limiterelacion where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function getLimitacion() {
        $res = $this->db->prepare("SELECT * FROM limiterelacion where limitacion = ?"); $res->bindParam(1, $_POST["limitev"]);
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getSubTL() {
        $res = $this->db->prepare("SELECT * FROM limiterelacion where subtl1 = ? OR subtl2 = ? OR subtl3 = ? OR subtl4 = ? OR subtl5 = ?
            OR subtl6 = ? OR subtl7 = ?"); $subtl = $_POST["subtlv"]; $res->bindParam(1, $subtl); $res->bindParam(2, $subtl);
        $res->bindParam(3, $subtl); $res->bindParam(4, $subtl); $res->bindParam(5, $subtl); $res->bindParam(6, $subtl);
        $res->bindParam(7, $subtl);
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getFrutas() {
        $res = $this->db->prepare("SELECT * FROM limiterelacion where tipofruta = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getSubtipos() {
        $res = $this->db->prepare("SELECT * FROM limiterelacion where subtipofruta = ?"); $res->bindParam(1, $_POST["subtipov"]);
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getNombreFrutas() {
        $res = $this->db->prepare("SELECT * FROM limiterelacion where nfruta = ?"); $res->bindParam(1, $_POST["nombrev"]);
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getFMostradas() { $res = $this->db->prepare("SELECT * FROM limiterelacion where mostrada!='No'");
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getFrutasCanon() { $res = $this->db->prepare("SELECT * FROM limiterelacion where canon!='No'");
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    } public function getFrutasNoCanon() { $res = $this->db->prepare("SELECT * FROM limiterelacion where canon='No'");
        if ($res->execute()){ while ($c = $res->fetch(PDO::FETCH_ASSOC)){ $this->limiterelacion[]=$c;}return $this->limiterelacion; }
    }
} ?>