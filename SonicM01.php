<?php class SonicM01 { private $db; private $juegos = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaJuego() { $res = $this->db->prepare("SELECT distinct nombrejuego as 'juegov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $juegos[] = $c["juegov"]; } return $juegos; }
    } public function sacaPlataforma() {
        $res = $this->db->prepare("SELECT distinct plat1 as 'platv' FROM videojuegos where plat1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; }
            $res = $this->db->prepare("SELECT distinct plat2 as 'platv' FROM videojuegos where plat2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; }
                $res = $this->db->prepare("SELECT distinct plat3 as 'platv' FROM videojuegos where plat3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; } }
            } return $plats;
        }
    } public function sacaGenero() { $res = $this->db->prepare("SELECT distinct genero as 'generov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $generos[] = $c["generov"]; } return $generos; }
    } public function sacaTipoNPC() { $res = $this->db->prepare("SELECT distinct tipoNPC as 'tipoNPCv' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tiposNPC[] = $c["tipoNPCv"]; } return $tiposNPC; }
    } public function getJuego() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where nombrejuego = ?"); $res->bindParam(1, $_POST["juegov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getPlataforma() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where plat1 = ? or plat2 = ? or plat3 = ?"); $plat = $_POST["platv"];
        $res->bindParam(1, $plat); $res->bindParam(2, $plat); $res->bindParam(3, $plat);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getGenero() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where genero = ?"); $res->bindParam(1, $_POST["generov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getTipoNPC() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where tipoNPC = ?"); $res->bindParam(1, $_POST["tipoNPCv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    }
}

?>