<?php class SonicM06 { private $db; private $musicazonas = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaNZ() { $res = $this->db->prepare("SELECT distinct nz as 'nzv' FROM musicazonas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nzs[] = $c["nzv"]; } return $nzs; }
    } public function sacaZonaCancion() { $res = $this->db->prepare("SELECT distinct zonacancion as 'zcv' FROM musicazonas");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $zonas[] = $c["zcv"]; } return $zonas; }
    } public function sacaCancionJuego() {
        $res = $this->db->prepare("SELECT distinct cancionjuego as 'cjv' FROM musicazonas where cancionjuego != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cancionjuegos[] = $c["cjv"]; } return $cancionjuegos; }
    } public function sacaCAct() {
        $res = $this->db->prepare("SELECT distinct cact1 as 'cactv' FROM musicazonas where cact1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
            $res = $this->db->prepare("SELECT distinct cact2 as 'cactv' FROM musicazonas where cact2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
                $res = $this->db->prepare("SELECT distinct cact3 as 'cactv' FROM musicazonas where cact3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
                    $res = $this->db->prepare("SELECT distinct cact4 as 'cactv' FROM musicazonas where cact4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
                        $res = $this->db->prepare("SELECT distinct cact5 as 'cactv' FROM musicazonas where cact5 != 'No'");
                        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
                            $res = $this->db->prepare("SELECT distinct cact6 as 'cactv' FROM musicazonas where cact6 != 'No'");
                            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; }
                                $res = $this->db->prepare("SELECT distinct cact7 as 'cactv' FROM musicazonas where cact7 != 'No'");
                                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cact[] = $c["cactv"]; } }
                            }
                        }
                    }
                }
            } return $cact;
        }
    } public function sacaArtista() {
        $res = $this->db->prepare("SELECT distinct artistac1 as 'artistav' FROM musicazonas where artistac1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistac[] = $c["artistav"]; }
            $res = $this->db->prepare("SELECT distinct artistac2 as 'artistav' FROM musicazonas where artistac2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistac[] = $c["artistav"]; }
                $res = $this->db->prepare("SELECT distinct artistac3 as 'artistav' FROM musicazonas where artistac3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistac[] = $c["artistav"]; }
                    $res = $this->db->prepare("SELECT distinct artistac4 as 'artistav' FROM musicazonas where artistac4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistac[] = $c["artistav"]; } }
                }
            } return $artistac;
        }
    } public function getNZ() { $res = $this->db->prepare("SELECT * FROM musicazonas where nz = ?"); $res->bindParam(1, $_POST["nzv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicazonas[] = $c; } return $this->musicazonas; }
    } public function getZonaCancion() {
        $res = $this->db->prepare("SELECT * FROM musicazonas where zonacancion = ?"); $res->bindParam(1, $_POST["zcv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicazonas[] = $c; } return $this->musicazonas; }
    } public function getCancionJuego() {
        $res = $this->db->prepare("SELECT * FROM musicazonas where cancionjuego = ?"); $res->bindParam(1, $_POST["cjv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicazonas[] = $c; } return $this->musicazonas; }
    } public function getCAct() {
        $res = $this->db->prepare("SELECT * FROM musicazonas where cact1 = ? OR cact2 = ? OR cact3 = ? OR cact4 = ? OR cact5 = ?
            OR cact6 = ? OR cact7 = ?"); $cact = $_POST["cactv"]; $res->bindParam(1, $cact); $res->bindParam(2, $cact);
        $res->bindParam(3, $cact); $res->bindParam(4, $cact); $res->bindParam(5, $cact); $res->bindParam(6, $cact);
        $res->bindParam(7, $cact);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicazonas[] = $c; } return $this->musicazonas; }
    } public function getArtista() {
        $res = $this->db->prepare("SELECT * FROM musicazonas where artistac1 = ? OR artistac2 = ? OR artistac3 = ? OR artistac4 = ?
            OR artistac5 = ? OR artistac6 = ? OR artistac7 = ?"); $artista = $_POST["artistav"]; $res->bindParam(1, $artista);
        $res->bindParam(2, $artista); $res->bindParam(3, $artista); $res->bindParam(4, $artista);
        $res->bindParam(5, $artista); $res->bindParam(6, $artista); $res->bindParam(7, $artista);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicazonas[] = $c; } return $this->musicazonas; }
    }
} ?>
