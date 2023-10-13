<?php class PokM05 { private $db; private $episodios = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTemporada() { $res = $this->db->prepare("SELECT distinct temp as 'tempv' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $temporadas[] = $c["tempv"]; } return $temporadas; }
    } public function sacaOpening() { $res = $this->db->prepare("SELECT distinct opening as 'openingv' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $openings[] = $c["openingv"]; } return $openings; }
    } public function sacaNTemp() { $res = $this->db->prepare("SELECT distinct nombretemp as 'nombretempv' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $ntemp[] = $c["nombretempv"]; } return $ntemp; }
    } public function sacaSagas() { $res = $this->db->prepare("SELECT distinct saga as 'sagav' FROM episodios");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sagas[] = $c["sagav"]; } return $sagas; }
    } public function c() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc' FROM episodios where cen='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cen[] = $c["totalc"]; } return $cen; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc1' FROM episodios where saga='El Comienzo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"]; } return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc2' FROM episodios where saga='Oro y Plata'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"]; } return $c2; }
    } public function c3() {
        $consulta1 = "SELECT count(idep) as 'totalc3' FROM episodios where saga='Rubi y Zafiro'";
        $res = $this->db->prepare("SELECT count(idep) as 'totalc3' FROM episodios where saga='Rubi y Zafiro'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"]; } return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc4' FROM episodios where saga='Diamante y Perla'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"]; } return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc5' FROM episodios where saga='Negro y Blanco'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"]; } return $c5; }
    } public function c6() { $res = $this->db->prepare("SELECT count(idep) as 'totalc6' FROM episodios where saga='XY'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"]; } return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc7' FROM episodios where saga='Sol y Luna'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"]; } return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(idep) as 'totalc8' FROM episodios where saga='Viajes Pokemon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"]; } return $c8; }
    } public function getTemporada() {
        $res = $this->db->prepare("SELECT * FROM episodios where temp = ?"); $res->bindParam(1, $_POST["tempv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getOpening() {
        $res = $this->db->prepare("SELECT * FROM episodios where opening = ?"); $res->bindParam(1, $_POST["openingv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getNombreTemp() {
        $res = $this->db->prepare("SELECT * FROM episodios where nombretemp = ?"); $res->bindParam(1, $_POST["nombretempv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getCen() {
        $res = $this->db->prepare("SELECT * FROM episodios where cen='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    } public function getSaga() {
        $res = $this->db->prepare("SELECT * FROM episodios where saga = ?"); $res->bindParam(1, $_POST["sagav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->episodios[] = $c; } return $this->episodios; }
    }
}
?>