<?php class SonicM04 { private $db; private $jefes = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=sonicdb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaNZ() { $res = $this->db->prepare("SELECT distinct nz as 'nzv' FROM jefes");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $nzs[] = $c["nzv"]; } return $nzs; }
    } public function sacaZona() { $res = $this->db->prepare("SELECT distinct zona as 'zcv' FROM jefes");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $zonas[] = $c["zcv"]; } return $zonas; }
    } public function sacaAparicion() {
        $res = $this->db->prepare("SELECT distinct aparicion1 as 'aparicionv' FROM jefes where aparicion1 != 'No'");
        if ($res->execute()) {while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $apariciones[] = $c["aparicionv"]; } return $apariciones;}
    } public function sacaJefe() { $res = $this->db->prepare("SELECT distinct jefe1 as 'jefev' FROM jefes where jefe1 != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
            $res = $this->db->prepare("SELECT distinct jefe2 as 'jefev' FROM jefes where jefe2 != 'No'");
            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                $res = $this->db->prepare("SELECT distinct jefe3 as 'jefev' FROM jefes where jefe3 != 'No'");
                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                    $res = $this->db->prepare("SELECT distinct jefe4 as 'jefev' FROM jefes where jefe4 != 'No'");
                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                        $res = $this->db->prepare("SELECT distinct jefe5 as 'jefev' FROM jefes where jefe5 != 'No'");
                        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                            $res = $this->db->prepare("SELECT distinct jefe6 as 'jefev' FROM jefes where jefe6 != 'No'");
                            if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                                $res = $this->db->prepare("SELECT distinct jefe7 as 'jefev' FROM jefes where jefe7 != 'No'");
                                if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; }
                                    $res = $this->db->prepare("SELECT distinct jefe8 as 'jefev' FROM jefes where jefe8 != 'No'");
                                    if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $jefe[] = $c["jefev"]; } }
                                }
                            }
                        }
                    }
                }
            } return $jefe;
        }
    } public function getNZ() { $res = $this->db->prepare("SELECT * FROM jefes where nz = ?"); $res->bindParam(1, $_POST["nzv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->jefes[] = $c; } return $this->jefes; }
    } public function getZona() {
        $res = $this->db->prepare("SELECT * FROM jefes where zona = ?"); $res->bindParam(1, $_POST["zcv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->jefes[] = $c; } return $this->jefes; }
    } public function getAparicion() {
        $res = $this->db->prepare("SELECT * FROM jefes where aparicion1 = ?"); $res->bindParam(1, $_POST["aparicionv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->jefes[] = $c; } return $this->jefes; }
    } public function getJefe() {
        $res = $this->db->prepare("SELECT * FROM jefes where jefe1 = ? OR jefe2 = ? OR jefe3 = ? OR jefe4 = ? OR jefe5 = ?
            OR jefe6 = ? OR jefe7 = ? OR jefe8 = ?"); $jefe = $_POST["jefev"]; $res->bindParam(1, $jefe); $res->bindParam(2, $jefe);
        $res->bindParam(3, $jefe); $res->bindParam(4, $jefe); $res->bindParam(5, $jefe); $res->bindParam(6, $jefe);
        $res->bindParam(7, $jefe); $res->bindParam(8, $jefe);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->jefes[] = $c; } return $this->jefes; }
    }
}
?>
