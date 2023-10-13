<?php class PokM04 { private $db; private $juegos = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaSaga() { $res = $this->db->prepare("SELECT distinct sagajuego as 'sagav' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sagajuegos[] = $c["sagav"]; } return $sagajuegos; }
    } public function sacaJuego() { $res = $this->db->prepare("SELECT distinct nombrejuego as 'juegov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $juegos[] = $c["juegov"]; } return $juegos; }
    } public function sacaPlataforma() {
        $res = $this->db->prepare("SELECT distinct plataforma1 as 'platv' FROM videojuegos where plataforma1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; }
            $res = $this->db->prepare("SELECT distinct plataforma2 as 'platv' FROM videojuegos where plataforma2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; }
                $res = $this->db->prepare("SELECT distinct plataforma3 as 'platv' FROM videojuegos where plataforma3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; } }
            } return $plats;
        }
    } public function sacaGenero() { $res = $this->db->prepare("SELECT distinct genero as 'generov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $generos[] = $c["generov"]; } return $generos; }
    } public function sacaTipoNPC() { $res = $this->db->prepare("SELECT distinct tipoNPC as 'tipoNPCv' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tiposNPC[] = $c["tipoNPCv"]; } return $tiposNPC; }
    } public function sacaGeneracionJuego() { $res = $this->db->prepare("SELECT distinct gj as 'genjv' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $genj[] = $c["genjv"]; } return $genj; }
    } public function sacaGeneracion() { $res = $this->db->prepare("SELECT distinct gen as 'genv' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $gen[] = $c["genv"]; } return $gen; }
    } public function getSaga() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where sagajuego = ?"); $res->bindParam(1, $_POST["sagav"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getJuego() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where nombrejuego = ?"); $res->bindParam(1, $_POST["juegov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getPlataforma() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where plataforma1 = ? or plataforma2 = ? or plataforma3 = ?");
        $plat = $_POST["platv"]; $res->bindParam(1, $plat); $res->bindParam(2, $plat); $res->bindParam(3, $plat);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getGenero() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where genero = ?"); $res->bindParam(1, $_POST["generov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getTipoNPC() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where tipoNPC = ?"); $res->bindParam(1, $_POST["tipoNPCv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getGeneracionJuego() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where gj = ?"); $res->bindParam(1, $_POST["genjv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getGeneracion() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where gen = ?"); $res->bindParam(1, $_POST["genv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    }
}

?>
