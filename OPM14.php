<?php class OPM14 { private $db; private $apariciones = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaSubtipoAp() { $res = $this->db->prepare("SELECT distinct subtipoap as 'subtipoapv' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtiposap[] = $c["subtipoapv"]; } return $subtiposap; }
    } public function sacaTmn() { $res = $this->db->prepare("SELECT distinct tmn as 'tmnv' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tmnv[] = $c["tmnv"]; } return $tmnv; }
    } public function sacaTapf() { $res = $this->db->prepare("SELECT distinct tapf as 'tapfv' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tapf[] = $c["tapfv"]; } return $tapf; }
    } public function sacaFruta() { $res = $this->db->prepare("SELECT distinct tipofruta as 'tipov' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaSubtipo() { $res = $this->db->prepare("SELECT distinct subtipofruta as 'subtipov' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $subtipos[] = $c["subtipov"]; } return $subtipos; }
    } public function sacaNombre() { $res = $this->db->prepare("SELECT distinct nfruta as 'nombrev' FROM apariciones");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nombres[] = $c["nombrev"]; } return $nombres; }
    } public function c() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc' FROM apariciones where tipofruta='Desconocido'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cd[] = $c["totalc"];}return $cd; }
    } public function c0() { $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc0' FROM apariciones where tipofruta='Logia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c0[] = $c["totalc0"];}return $c0; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1'FROM apariciones where tipofruta='Zoan'
            and subtipofruta='Normal' or usuario='Rob Lucci'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c1b() {
        $res = $this->db->prepare("SELECT count(tipofruta) as'totalc1b'FROM apariciones where tipofruta='Zoan'
            and subtipofruta='Especial' or subtipofruta='Prehistorica' or subtipofruta='Mitologica'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1b[] = $c["totalc1b"];}return $c1b; }
    } public function c1c() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1c' FROM apariciones where tipofruta='Zoan'
            and subtipofruta='Desconocida'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1c[] = $c["totalc1c"];}return $c1c; }
    } public function c1d() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1d'FROM apariciones where usuario='Kozuki Momonosuke'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1d[] = $c["totalc1d"];}return $c1d; }
    } public function c1e() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc1e' FROM apariciones where modelo='Efectiva'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1e[] = $c["totalc1e"];}return $c1e; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipofruta) as 'totalc2' FROM apariciones where tipofruta='Paramecia'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(apf1) as 'totalc3' FROM apariciones where apf1!='No' and canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(apf1) as 'totalc4' FROM apariciones where apf1!='No' and canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc5' FROM apariciones where canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(subtipofruta) as 'totalc6' FROM apariciones where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc7' FROM apariciones where subtipoap='Anime/Manga'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc8' FROM apariciones where subtipoap='Manga'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc9' FROM apariciones where subtipoap='Anime'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc10' FROM apariciones where subtipoap='Pelicula'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    } public function c11() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc11' FROM apariciones where subtipoap='Videojuego'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c11[] = $c["totalc11"];}return $c11; }
    } public function c12() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc12' FROM apariciones where subtipoap='SBS'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c12[] = $c["totalc12"];}return $c12; }
    } public function c13() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc13' FROM apariciones where subtipoap='Evento'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c13[] = $c["totalc13"];}return $c13; }
    } public function c14() {
        $res = $this->db->prepare("SELECT count(subtipoap) as 'totalc14' FROM apariciones where subtipoap='Otro'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c14[] = $c["totalc14"];}return $c14; }
    } public function cm() { $res = $this->db->prepare("SELECT count(tmn) as 'totalcm' FROM apariciones where tmn='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cm[] = $c["totalcm"];}return $cm; }
    } public function capfc() {
        $res = $this->db->prepare("SELECT count(tapf) as 'totalcapf' FROM apariciones where tapf='No' and canon='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $capfc[] = $c["totalcapf"];}return $capfc; }
    } public function capfnc() {
        $res = $this->db->prepare("SELECT count(tapf) as 'totalcapf' FROM apariciones where tapf='No' and canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $capfnc[] = $c["totalcapf"];}return $capfnc; }
    } public function getSubtiposAp() {
        $res = $this->db->prepare("SELECT * FROM apariciones where subtipoap = ?"); $res->bindParam(1, $_POST["subtipoapv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getTmn() {
        $res = $this->db->prepare("SELECT * FROM apariciones where tmn = ?"); $res->bindParam(1, $_POST["tmnv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getTapf() {
        $res = $this->db->prepare("SELECT * FROM apariciones where tapf = ?"); $res->bindParam(1, $_POST["tapfv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getFrutas() {
        $res = $this->db->prepare("SELECT * FROM apariciones where tipofruta = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getSubtipos() {
        $res = $this->db->prepare("SELECT * FROM apariciones where subtipofruta = ?"); $res->bindParam(1, $_POST["subtipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getNombreFrutas() {
        $res = $this->db->prepare("SELECT * FROM apariciones where nfruta = ?"); $res->bindParam(1, $_POST["nombrev"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getFMostradas() { $res = $this->db->prepare("SELECT * FROM apariciones where apf1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getFrutasCanon() { $res = $this->db->prepare("SELECT * FROM apariciones where canon!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    } public function getFrutasNoCanon() { $res = $this->db->prepare("SELECT * FROM apariciones where canon='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->apariciones[] = $c; } return $this->apariciones; }
    }
}
?>
