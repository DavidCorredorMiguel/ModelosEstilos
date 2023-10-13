<?php class OPM13 { private $db; private $pelis = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=onepiecedb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacapeli() { $res = $this->db->prepare("SELECT distinct nombre as 'peliv' FROM peliculas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $pelis[] = $c["peliv"]; } return $pelis; }
    } public function sacaPersonaje() { $res = $this->db->prepare("SELECT distinct personajes as 'personajesv' FROM peliculas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $personajes[] = $c["personajesv"]; }return $personajes; }
    } public function sacaIsla() { $res = $this->db->prepare("SELECT distinct isla1 as 'islav' FROM peliculas where isla1!='No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $islas[] = $c["islav"]; }
            $res = $this->db->prepare("SELECT distinct isla2 as 'islav' FROM peliculas where isla2!='No'");
            if ($res->execute()) {while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $islas[] = $c["islav"]; }
                $res = $this->db->prepare("SELECT distinct isla3 as 'islav' FROM peliculas where isla3!='No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $islas[] = $c["islav"]; } }
            } return $islas;
        }
    } public function sacasp() { $res = $this->db->prepare("SELECT distinct sp as 'spv' FROM peliculas where sp != 0");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $sps[] = $c["spv"]; } return $sps; }
    } public function getPeli() {
        $res = $this->db->prepare("SELECT * FROM peliculas where nombre = ?"); $res->bindParam(1, $_POST["peliv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pelis[] = $c; } return $this->pelis; }
    } public function getPersonaje() {
        $res = $this->db->prepare("SELECT * FROM peliculas where personajes = ?"); $res->bindParam(1, $_POST["personajesv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pelis[] = $c; } return $this->pelis; }
    } public function getIsla() {
        $res = $this->db->prepare("SELECT * FROM peliculas where isla1 = ? or isla2 = ? or isla3 = ?"); $isla = $_POST["islav"];
        $res->bindParam(1, $isla); $res->bindParam(2, $isla); $res->bindParam(3, $isla);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pelis[] = $c; } return $this->pelis; }
    } public function getsp() { $res = $this->db->prepare("SELECT * FROM peliculas where sp = ?"); $res->bindParam(1, $_POST["spv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pelis[] = $c; } return $this->pelis; }
    }
}

?>
