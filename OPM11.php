<?php class OPM11 { private $db; private $episodios = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage());}return $this->db;
    } public function sacaTemporada() { $res = $this->db->prepare("SELECT distinct temp as 'tempv' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $temporadas[] = $c["tempv"];}return $temporadas; }
    } public function sacaOpening() { $res = $this->db->prepare("SELECT distinct opening as 'openingv' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $openings[] = $c["openingv"];}return $openings; }
    } public function sacaEnding() {
        $res = $this->db->prepare("SELECT distinct ending as 'endingv' FROM episodios where ending != 'Ninguno'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $endings[] = $c["endingv"];}return $endings; }
    } public function sacaArcos() { $res = $this->db->prepare("SELECT distinct arco as 'arcov' FROM episodios where carc='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $arcos[] = $c["arcov"];}return $arcos; }
    } public function sacaArcosNoCanon() { $res = $this->db->prepare("SELECT distinct arco as 'arcov' FROM episodios where carc='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $arcosnc[] = $c["arcov"];}return $arcosnc; }
    } public function sacaSagas() { $res = $this->db->prepare("SELECT distinct saga as 'sagav' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sagas[] = $c["sagav"];}return $sagas; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc1' FROM episodios where saga='East Blue'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc2' FROM episodios where saga='Arabasta'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc3' FROM episodios where saga='Isla Del Cielo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc4' FROM episodios where saga='Water 7'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc5' FROM episodios where saga='Thriller Bark'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc6' FROM episodios where saga='Guerra En La Cumbre'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc7' FROM episodios where saga='Isla De Los Hombres Pez'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc8' FROM episodios where saga='Dressrosa'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc9' FROM episodios where saga='Whole Cake Island'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc10' FROM episodios where saga='Pais De Wano'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    }  public function c11() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc11' FROM episodios where saga='Final'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c11[] = $c["totalc11"];}return $c11; }
    } public function c12() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc12' FROM episodios where cep='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c12[] = $c["totalc12"];}return $c12; }
    } public function c13() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc13' FROM episodios where cep='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c13[] = $c["totalc13"];}return $c13; }
    } public function getTemporada() {
        $res = $this->db->prepare("SELECT * FROM episodios where temp = ?"); $res->bindParam(1, $_POST["tempv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getOpening() {
        $res = $this->db->prepare("SELECT * FROM episodios where opening = ?"); $res->bindParam(1, $_POST["openingv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getEnding() {
        $res = $this->db->prepare("SELECT * FROM episodios where ending = ?"); $res->bindParam(1, $_POST["endingv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getArco() {
        $res = $this->db->prepare("SELECT * FROM episodios where arco = ?"); $res->bindParam(1, $_POST["arcov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c;}return $this->episodios; }
    } public function getSaga() {
        $res = $this->db->prepare("SELECT * FROM episodios where saga = ?"); $res->bindParam(1, $_POST["sagav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getEpisodiosCanon() { $res = $this->db->prepare("SELECT * FROM episodios where cep!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c;}return $this->episodios; }
    } public function getEpisodiosNoCanon() { $res = $this->db->prepare("SELECT * FROM episodios where cep='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c;}return $this->episodios; }
    }
}
?>
