<?php class PokM06 { private $db; private $equipos = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaGen() { $res = $this->db->prepare("SELECT distinct gen as 'genv' FROM equipos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $gen[] = $c["genv"]; } return $gen; }
    } public function sacaregion() { $res = $this->db->prepare("SELECT distinct region as 'regionv' FROM equipos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $region[] = $c["regionv"]; } return $region; }
    } public function sacaJuego() { $res = $this->db->prepare("SELECT distinct nombrejuego as 'nombrejuegov' FROM equipos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $njuego[] = $c["nombrejuegov"]; } return $njuego; }
    } public function sacaPlataforma() {
        $res = $this->db->prepare("SELECT distinct plataforma as 'platv' FROM equipos where plataforma != 'No'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $plats[] = $c["platv"]; } } return $plats;
    } public function sacaEquipo() { $res = $this->db->prepare("SELECT distinct nombreeq as 'nombreeqv' FROM equipos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $ngen[] = $c["nombreeqv"]; } return $ngen; }
    } public function sacaTipoEq() {
        $res = $this->db->prepare("SELECT distinct teq1 as 'teqv' FROM equipos where teq1 !='No' and teq1 !='Todos Sin Hada'
            and teq1!='Todos' order by teq1 asc");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $teqs[] = $c["teqv"]; } return $teqs; }
    } public function sacaTitulo() { $res = $this->db->prepare("SELECT distinct titulo as 'titulov' FROM equipos");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $titulo[] = $c["titulov"]; } return $titulo; }
    } public function getGen() {
        $res = $this->db->prepare("SELECT * FROM equipos where gen = ?"); $res->bindParam(1, $_POST["genv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    } public function getregion() {
        $res = $this->db->prepare("SELECT * FROM equipos where region = ?"); $res->bindParam(1, $_POST["regionv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    } public function getNJuego() {
        $res = $this->db->prepare("SELECT * FROM equipos where nombrejuego = ?"); $res->bindParam(1, $_POST["njuegov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    } public function getNEquipo() {
        $res = $this->db->prepare("SELECT * FROM equipos where nombreeq = ?"); $res->bindParam(1, $_POST["nombreeqv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    } public function getTipoEq() {
        $res = $this->db->prepare("SELECT * FROM equipos where teq1 = ? or teq2 = ? or teq3 = ? or teq4 = ? or teq5 = ? or teq6 = ?
            or teq7 = ? or teq8 = ? or teq9 = ? or teq10 = ? or teq11 = ?"); $teq = $_POST["teqv"]; $res->bindParam(1, $teq);
        $res->bindParam(2, $teq); $res->bindParam(3, $teq); $res->bindParam(4, $teq); $res->bindParam(5, $teq); $res->bindParam(6, $teq);
        $res->bindParam(7, $teq); $res->bindParam(8, $teq); $res->bindParam(9, $teq);$res->bindParam(10, $teq);$res->bindParam(11, $teq);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    } public function getTitulo() {
        $res = $this->db->prepare("SELECT * FROM equipos where titulo = ?"); $res->bindParam(1, $_POST["titulov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->equipos[] = $c; } return $this->equipos; }
    }
}
?>