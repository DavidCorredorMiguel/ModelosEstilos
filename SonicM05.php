<?php class SonicM05 { private $db; private $musica = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaNZ() { $res = $this->db->prepare("SELECT distinct nz as 'nzv' FROM musica");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nzs[] = $c["nzv"]; } return $nzs; }
    } public function sacaZonaCancion() { $res = $this->db->prepare("SELECT distinct zonacancion as 'zcv' FROM musica");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $zonas[] = $c["zcv"]; } return $zonas; }
    } public function sacaCancionJuego() {
        $res = $this->db->prepare("SELECT distinct cancionjuego as 'cjv' FROM musica where cancionjuego != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cancionjuegos[] = $c["cjv"]; } return $cancionjuegos; }
    } public function sacaTemaP() { $res = $this->db->prepare("SELECT distinct temap as 'temapv' FROM musica where temap != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $temasp[] = $c["temapv"]; } return $temasp; }
    } public function sacaArtista() {
        $res = $this->db->prepare("SELECT distinct artistatp as 'artistav' FROM musica where artistatp != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artista[] = $c["artistav"]; }
            $res = $this->db->prepare("SELECT distinct artistatf as 'artistav' FROM musica where artistatf != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artista[] = $c["artistav"]; } return $artista; }
        }
    } public function sacaTemaFinal() {
        $res = $this->db->prepare("SELECT distinct temafinal as 'temafinalv' FROM musica where temafinal != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $temasf[] = $c["temafinalv"]; } return $temasf; }
    } public function getNZ() { $res = $this->db->prepare("SELECT * FROM musica where nz = ?"); $res->bindParam(1, $_POST["nzv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    } public function getZonaCancion() {
        $res = $this->db->prepare("SELECT * FROM musica where zonacancion = ?"); $res->bindParam(1, $_POST["zcv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    } public function getCancionJuego() {
        $res = $this->db->prepare("SELECT * FROM musica where cancionjuego = ?"); $res->bindParam(1, $_POST["cjv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    } public function getTemaP() {
        $res = $this->db->prepare("SELECT * FROM musica where temap = ?"); $res->bindParam(1, $_POST["temapv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    } public function getArtista() {
        $res = $this->db->prepare("SELECT * FROM musica where artistatp = ?"); $res->bindParam(1, $_POST["artistav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    } public function getTemaFinal() {
        $res = $this->db->prepare("SELECT * FROM musica where temafinal = ?"); $res->bindParam(1, $_POST["temafinalv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musica[] = $c; } return $this->musica; }
    }
} ?>
