<?php class PokM03 { private $db; private $pokemon = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipo() { $res = $this->db->prepare("SELECT distinct tipo1 as 'tipov' FROM movimientos order by tipo1 asc");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacatmov() { $res = $this->db->prepare("SELECT distinct tmov as 'tmovv' FROM movimientos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tiposmov[] = $c["tmovv"]; } return $tiposmov; }
    } public function c1() { $res = $this->db->prepare("SELECT count(fre) as 'totalc1' FROM movimientos where fre='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"]; } return $c1; }
    } public function c2() { $res = $this->db->prepare("SELECT count(gm) as 'totalc2' FROM movimientos where gm='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"]; } return $c2; }
    } public function getTipo() {
        $res = $this->db->prepare("SELECT * FROM movimientos where tipo1 = ?"); $res->bindParam(1, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function gettiposmov() {
        $res = $this->db->prepare("SELECT * FROM movimientos where tmov = ?"); $res->bindParam(1, $_POST["tmovv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getFormas() { $res = $this->db->prepare("SELECT * FROM movimientos where fre='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getGigamax() { $res = $this->db->prepare("SELECT * FROM movimientos where gm='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    }
}

?>
