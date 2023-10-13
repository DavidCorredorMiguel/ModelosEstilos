<?php class OPM12 { private $db; private $juegos = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaJuego() { $res = $this->db->prepare("SELECT distinct nombrejuego as 'juegov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $juegos[] = $c["juegov"]; } return $juegos; }
    } public function sacaPlataforma() {
        $res = $this->db->prepare("SELECT distinct plataforma1 as 'plataformav' FROM videojuegos where plataforma1 != 'Ninguna'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plataformas[] = $c["plataformav"]; }
            $res = $this->db->prepare("SELECT distinct plataforma2 as 'plataformav' FROM videojuegos where
            plataforma2 != 'Ninguna' and plataforma2 != 'PS2' and plataforma2 != '3DS'");
            if ($res->execute()) {while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plataformas[] = $c["plataformav"]; }
                $res = $this->db->prepare("SELECT distinct plataforma3 as 'plataformav' FROM videojuegos where plataforma3 != 'Ninguna'
                    and plataforma3 != 'PS3' and plataforma3 != 'PS4' and plataforma3 != 'Xbox One'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plataformas[] = $c["plataformav"]; } }
            } return $plataformas;
        }
    } public function sacaGenero() { $res = $this->db->prepare("SELECT distinct genero as 'generov' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $generos[] = $c["generov"]; } return $generos; }
    } public function sacaPJugable() {
        $res = $this->db->prepare("SELECT distinct pjugable as 'pjugablev' FROM videojuegos where pjugable!='Ninguno Mas'
            and imgpjugable!='Weekly Shonen Jump Logo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $pjugable[] = $c["pjugablev"]; } return $pjugable; }
    } public function sacaTipoNPC() { $res = $this->db->prepare("SELECT distinct tipoNPC as 'tipoNPCv' FROM videojuegos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tiposNPC[] = $c["tipoNPCv"]; } return $tiposNPC; }
    } public function getJuego() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where nombrejuego = ?"); $res->bindParam(1, $_POST["juegov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getPlataforma() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where plataforma1 = ? or plataforma2 = ? or plataforma3 = ?");
        $plat = $_POST["plataformav"]; $res->bindParam(1, $plat); $res->bindParam(2, $plat); $res->bindParam(3, $plat);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getGenero() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where genero = ?"); $res->bindParam(1, $_POST["generov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getPJugable() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where pjugable = ?"); $res->bindParam(1, $_POST["pjugablev"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    } public function getTipoNPC() {
        $res = $this->db->prepare("SELECT * FROM videojuegos where tipoNPC = ?"); $res->bindParam(1, $_POST["tipoNPCv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->juegos[] = $c; } return $this->juegos; }
    }
}

?>