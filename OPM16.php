<?php class OPM16 { private $db; private $mangaanime = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaVol() { $res = $this->db->prepare("SELECT distinct vol as 'volv' FROM mangaanime");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $vol[] = $c["volv"]; } return $vol; }
    } public function sacaNPag() { $res = $this->db->prepare("SELECT distinct npag as 'npagv' FROM mangaanime order by npag asc");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $npag[] = $c["npagv"]; } return $npag; }
    } public function sacaPortadas() { $res = $this->db->prepare("SELECT distinct tipoportada as 'tipov' FROM mangaanime");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaMinihistoria() {
        $res = $this->db->prepare("SELECT distinct minihistoria as 'miniv' FROM mangaanime where minihistoria != 'Ninguna'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $minis[] = $c["miniv"]; } return $minis; }
    } public function sacaArcos() { $res = $this->db->prepare("SELECT distinct arco as 'arcov' FROM mangaanime");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $arcos[] = $c["arcov"];}return $arcos; }
    } public function sacaSagas() { $res = $this->db->prepare("SELECT distinct saga as 'sagav' FROM mangaanime");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sagas[] = $c["sagav"];}return $sagas; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc1' FROM mangaanime where minihistoria!='Ninguna'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc2' FROM mangaanime where saga='East Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc3' FROM mangaanime where saga='Arabasta'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc4' FROM mangaanime where saga='Isla Del Cielo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc5' FROM mangaanime where saga='Water 7'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc6' FROM mangaanime where saga='Thriller Bark'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc7' FROM mangaanime where saga='Guerra En La Cumbre'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc8' FROM mangaanime where saga='Isla De Los Hombres Pez'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc9' FROM mangaanime where saga='Dressrosa'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc10' FROM mangaanime where saga='Cuatro Emperadores'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    } public function c11() {
        $res = $this->db->prepare("SELECT count(idcap) as 'totalc11' FROM mangaanime where saga='Final'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c11[] = $c["totalc11"];}return $c11; }
    } public function getVol() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where vol = ?"); $res->bindParam(1, $_POST["volv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    } public function getNPag() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where npag = ?"); $res->bindParam(1, $_POST["npagv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    } public function getPortada() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where tipoportada = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    } public function getCapMinihistoria() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where minihistoria = ?"); $res->bindParam(1, $_POST["miniv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    } public function getArco() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where arco = ?"); $res->bindParam(1, $_POST["arcov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c;}return $this->mangaanime; }
    } public function getSaga() {
        $res = $this->db->prepare("SELECT * FROM mangaanime where saga = ?"); $res->bindParam(1, $_POST["sagav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    } public function getPAnime() {$res = $this->db->prepare("SELECT * FROM mangaanime where pa!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->mangaanime[] = $c; } return $this->mangaanime; }
    }
} ?>