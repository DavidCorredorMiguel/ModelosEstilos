<?php class OPM01 { private $db; private $frutas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaFruta() { $res = $this->db->prepare("SELECT distinct tipofruta as 'tipov' FROM frutasdiablo");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaSubtipo() { $res = $this->db->prepare("SELECT distinct subtipofruta as 'subtipov' FROM frutasdiablo");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtipos[] = $c["subtipov"]; } return $subtipos; }
    } public function sacaNombre() { $res = $this->db->prepare("SELECT distinct nfruta as 'nombrev' FROM frutasdiablo");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nombres[] = $c["nombrev"]; } return $nombres; }
    } public function sacaModelo() {
        $res = $this->db->prepare("SELECT distinct modelo as 'modelov' FROM frutasdiablo where modelo!='Sin Modelo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $modelo[] = $c["modelov"]; } return $modelo; }
    } public function sacaNivel() { $res = $this->db->prepare("SELECT distinct nivel as 'nivelv' FROM frutasdiablo");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nivel[] = $c["nivelv"]; } return $nivel; }
    } public function sacaUsoFruta() { $res = $this->db->prepare("SELECT distinct usofruta as 'usofrutav' FROM frutasdiablo");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $usofruta[] = $c["usofrutav"]; } return $usofruta; }
    } public function sumado() { $res = $this->db->prepare("SELECT SUM(idtf) as 'totalsumado' FROM frutasdiablo where idtf=4");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sumado[] = $c["totalsumado"]; } return $sumado; }
    } public function c() { $res = $this->db->prepare("SELECT count(idtf) as 'totalc' FROM frutasdiablo where idtf=4");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cd[] = $c["totalc"]; } return $cd; }
    } public function c0() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc0' FROM frutasdiablo where tipofruta='Logia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c0[] = $c["totalc0"];}return $c0; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1'FROM frutasdiablo where tipofruta='Zoan'
            and subtipofruta='Normal' or usuario='Rob Lucci'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c1b() {
        $res = $this->db->prepare("SELECT count(tipofruta) as'totalc1b'FROM frutasdiablo where tipofruta='Zoan'
            and subtipofruta='Especial' or subtipofruta='Prehistorica' or subtipofruta='Mitologica'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1b[] = $c["totalc1b"];}return $c1b; }
    } public function c1c() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1c' FROM frutasdiablo where tipofruta='Zoan'
            and subtipofruta='Desconocida'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1c[] = $c["totalc1c"];}return $c1c; }
    } public function c1d() {
        $res = $this->db->prepare("SELECT count(tipofruta)as 'totalc1d'FROM frutasdiablo where usuario='Kozuki Momonosuke'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1d[] = $c["totalc1d"];}return $c1d; }
    } public function c1e() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1e' FROM frutasdiablo where modelo='Efectiva'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1e[] = $c["totalc1e"];}return $c1e; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc2' FROM frutasdiablo where tipofruta='Paramecia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(mostrada) as 'totalc3' FROM frutasdiablo where mostrada!='No' and canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(mostrada) as 'totalc4' FROM frutasdiablo where mostrada!='No' and canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc5' FROM frutasdiablo where canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc6' FROM frutasdiablo where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function getFrutas() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where tipofruta = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getSubtipos() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where subtipofruta = ?"); $res->bindParam(1, $_POST["subtipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getNombreFrutas() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where nfruta = ?"); $res->bindParam(1, $_POST["nombrev"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getModelo() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where modelo = ?"); $res->bindParam(1, $_POST["modelov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getNivel() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where nivel = ?"); $res->bindParam(1, $_POST["nivelv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getUsoFruta() {
        $res = $this->db->prepare("SELECT * FROM frutasdiablo where usofruta = ?"); $res->bindParam(1, $_POST["usofrutav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getFMostradas() { $res = $this->db->prepare("SELECT * FROM frutasdiablo where mostrada='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getFrutasCanon() { $res = $this->db->prepare("SELECT * FROM frutasdiablo where canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    } public function getFrutasNoCanon() { $res = $this->db->prepare("SELECT * FROM frutasdiablo where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->frutas[] = $c; } return $this->frutas; }
    }
}

?>
