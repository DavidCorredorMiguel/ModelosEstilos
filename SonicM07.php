<?php class SonicM07 { private $db; private $musicajefes = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaNZ() { $res = $this->db->prepare("SELECT distinct nz as 'nzv' FROM musicajefes");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nzs[] = $c["nzv"]; } return $nzs; }
    } public function sacaZonaCancion() { $res = $this->db->prepare("SELECT distinct zonacancion as 'zcv' FROM musicajefes");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $zonas[] = $c["zcv"]; } return $zonas; }
    } public function sacaCancionJuego() {
        $res = $this->db->prepare("SELECT distinct cancionjuego as 'cjv' FROM musicajefes where cancionjuego != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cancionjuegos[] = $c["cjv"]; } return $cancionjuegos; }
    } public function sacaJefe() { $res = $this->db->prepare("SELECT distinct jefe1 as 'jefev' FROM musicajefes where jefe1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
            $res = $this->db->prepare("SELECT distinct jefe2 as 'jefev' FROM musicajefes where jefe2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                $res = $this->db->prepare("SELECT distinct jefe3 as 'jefev' FROM musicajefes where jefe3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                    $res = $this->db->prepare("SELECT distinct jefe4 as 'jefev' FROM musicajefes where jefe4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                        $res = $this->db->prepare("SELECT distinct jefe5 as 'jefev' FROM musicajefes where jefe5 != 'No'");
                        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                            $res = $this->db->prepare("SELECT distinct jefe6 as 'jefev' FROM musicajefes where jefe6 != 'No'");
                            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                                $res = $this->db->prepare("SELECT distinct jefe7 as 'jefev' FROM musicajefes where jefe7 != 'No'");
                                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                                    $res = $this->db->prepare("SELECT distinct jefe8 as 'jefev' FROM musicajefes where jefe8 != 'No'");
                                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; } }
                                }
                            }
                        }
                    }
                }
            } return $jefe;
        }
    } public function sacaCjefe() {$res = $this->db->prepare("SELECT distinct cjefe1 as 'cjefev' FROM musicajefes where cjefe1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
            $res = $this->db->prepare("SELECT distinct cjefe2 as 'cjefev' FROM musicajefes where cjefe2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                $res = $this->db->prepare("SELECT distinct cjefe3 as 'cjefev' FROM musicajefes where cjefe3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                    $res = $this->db->prepare("SELECT distinct cjefe4 as 'cjefev' FROM musicajefes where cjefe4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                        $res = $this->db->prepare("SELECT distinct cjefe5 as 'cjefev' FROM musicajefes where cjefe5 != 'No'");
                        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                            $res = $this->db->prepare("SELECT distinct cjefe6 as 'cjefev' FROM musicajefes where cjefe6 != 'No'");
                            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                                $res = $this->db->prepare("SELECT distinct cjefe7 as 'cjefev' FROM musicajefes where cjefe7 != 'No'");
                                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; }
                                    $res= $this->db->prepare("SELECT distinct cjefe8 as 'cjefev' FROM musicajefes where cjefe8 != 'No'");
                                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $cjefe[] = $c["cjefev"]; } }
                                }
                            }
                        }
                    }
                }
            } return $cjefe;
        }
    } public function sacaArtista() {
        $res = $this->db->prepare("SELECT distinct artistaj1 as 'artistav' FROM musicajefes where artistaj1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistaj[] = $c["artistav"]; }
            $res = $this->db->prepare("SELECT distinct artistaj2 as 'artistav' FROM musicajefes where artistaj2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistaj[] = $c["artistav"]; }
                $res = $this->db->prepare("SELECT distinct artistaj3 as 'artistav' FROM musicajefes where artistaj3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistaj[] = $c["artistav"]; }
                    $res = $this->db->prepare("SELECT distinct artistaj4 as 'artistav' FROM musicajefes where artistaj4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $artistaj[] = $c["artistav"]; } }
                }
            } return $artistaj;
        }
    } public function getNZ() { $res = $this->db->prepare("SELECT * FROM musicajefes where nz = ?"); $res->bindParam(1, $_POST["nzv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    } public function getZonaCancion() {
        $res = $this->db->prepare("SELECT * FROM musicajefes where zonacancion = ?"); $res->bindParam(1, $_POST["zcv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    } public function getCancionJuego() {
        $res = $this->db->prepare("SELECT * FROM musicajefes where cancionjuego = ?"); $res->bindParam(1, $_POST["cjv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    } public function getJefe() {
        $res = $this->db->prepare("SELECT * FROM musicajefes where jefe1 = ? OR jefe2 = ? OR jefe3 = ? OR jefe4 = ? OR jefe5 = ?
            OR jefe6 = ? OR jefe7 = ? OR jefe8 = ?"); $jefe = $_POST["jefev"]; $res->bindParam(1, $jefe); $res->bindParam(2, $jefe);
        $res->bindParam(3, $jefe); $res->bindParam(4, $jefe); $res->bindParam(5, $jefe); $res->bindParam(6, $jefe);
        $res->bindParam(7, $jefe); $res->bindParam(8, $jefe);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    } public function getCJefe() {
        $res = $this->db->prepare("SELECT * FROM musicajefes where cjefe1 = ? OR cjefe2 = ? OR cjefe3 = ? OR cjefe4 = ? OR cjefe5 = ?
            OR cjefe6 = ? OR cjefe7 = ? OR cjefe7 = ?"); $cjefe = $_POST["cjefev"]; $res->bindParam(1, $cjefe);
        $res->bindParam(2, $cjefe); $res->bindParam(3, $cjefe); $res->bindParam(4, $cjefe);
        $res->bindParam(5, $cjefe); $res->bindParam(6, $cjefe); $res->bindParam(7, $cjefe);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    } public function getArtista() {
        $res = $this->db->prepare("SELECT * FROM musicajefes where artistaj1 = ? OR artistaj2 = ? OR artistaj3 = ? OR artistaj4 = ?
            OR artistaj5 = ? OR artistaj6 = ? OR artistaj7 = ?"); $artista = $_POST["artistav"]; $res->bindParam(1, $artista);
        $res->bindParam(2, $artista); $res->bindParam(3, $artista); $res->bindParam(4, $artista);
        $res->bindParam(5, $artista); $res->bindParam(6, $artista); $res->bindParam(7, $artista);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->musicajefes[] = $c; } return $this->musicajefes; }
    }
}

?>