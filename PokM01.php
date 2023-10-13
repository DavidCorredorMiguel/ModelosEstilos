<?php class PokM01 { private $db; private $pokemon = array();
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost; dbname=pokemondb", "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $this->db->exec("set character set utf8");
        } catch (Exception $ex) { die("Error en conexion. ERROR " . $ex->getMessage()); } return $this->db;
    } public function sacaTipo() { $res = $this->db->prepare("SELECT distinct tipo1 as 'tipov' FROM pokedex order by tipo1 asc");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $tipos[] = $c["tipov"]; } return $tipos; }
    } public function sacaregion() { $res = $this->db->prepare("SELECT distinct region as 'regionv' FROM pokedex");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $regiones[] = $c["regionv"]; } return $regiones; }
    } public function c1() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc1' FROM pokedex where tipo1='Normal' or tipo2='Normal'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c1[] = $c["totalc1"];}return $c1; }
    } public function c2() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc2' FROM pokedex where tipo1='Acero' or tipo2='Acero'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c2[] = $c["totalc2"];}return $c2; }
    } public function c3() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc3' FROM pokedex where tipo1='Agua' or tipo2='Agua'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c3[] = $c["totalc3"];}return $c3; }
    } public function c4() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc4' FROM pokedex where tipo1='Bicho' or tipo2='Bicho'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c4[] = $c["totalc4"];}return $c4; }
    } public function c5() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc5' FROM pokedex where tipo1='Dragon' or tipo2='Dragon'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c5[] = $c["totalc5"];}return $c5; }
    } public function c6() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc6' FROM pokedex where tipo1='Electrico' or tipo2='Electrico'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c6[] = $c["totalc6"];}return $c6; }
    } public function c7() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc7' FROM pokedex where tipo1='Fantasma' or tipo2='Fantasma'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c7[] = $c["totalc7"];}return $c7; }
    } public function c8() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc8' FROM pokedex where tipo1='Fuego' or tipo2='Fuego'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c8[] = $c["totalc8"];}return $c8; }
    } public function c9() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc9' FROM pokedex where tipo1='Hada' or tipo2='Hada'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c9[] = $c["totalc9"];}return $c9; }
    } public function c10() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc10' FROM pokedex where tipo1='Hielo' or tipo2='Hielo'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c10[] = $c["totalc10"];}return $c10; }
    } public function c11() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc11' FROM pokedex where tipo1='Lucha' or tipo2='Lucha'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c11[] = $c["totalc11"];}return $c11; }
    } public function c12() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc12' FROM pokedex where tipo1='Planta' or tipo2='Planta'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c12[] = $c["totalc12"];}return $c12; }
    } public function c13() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc13' FROM pokedex where tipo1='Psiquico' or tipo2='Psiquico'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c13[] = $c["totalc13"];}return $c13; }
    } public function c14() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc14' FROM pokedex where tipo1='Roca' or tipo2='Roca'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c14[] = $c["totalc14"];}return $c14; }
    } public function c15() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc15' FROM pokedex where tipo1='Siniestro' or tipo2='Siniestro'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c15[] = $c["totalc15"];}return $c15; }
    } public function c16() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc16' FROM pokedex where tipo1='Tierra' or tipo2='Tierra'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c16[] = $c["totalc16"];}return $c16; }
    } public function c17() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc17' FROM pokedex where tipo1='Veneno' or tipo2='Veneno'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c17[] = $c["totalc17"];}return $c17; }
    } public function c18() {
        $res = $this->db->prepare("SELECT count(tipo1) as 'totalc18' FROM pokedex where tipo1='Volador' or tipo2='Volador'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c18[] = $c["totalc18"];}return $c18; }
    } public function c19() {
        $res = $this->db->prepare("SELECT count(tipopok) as 'totalc19' FROM pokedex where tipopok='Legendario'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c19[] = $c["totalc19"];}return $c19; }
    } public function c20() {
        $res = $this->db->prepare("SELECT count(tipopok) as 'totalc20' FROM pokedex where tipopok='Singular'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c20[] = $c["totalc20"];}return $c20; }
    } public function c21() { $res = $this->db->prepare("SELECT count(me) as 'totalc21' FROM pokedex where me='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c21[] = $c["totalc21"];}return $c21; }
    } public function c22() { $res = $this->db->prepare("SELECT count(fre) as 'totalc22' FROM pokedex where fre='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c22[] = $c["totalc22"];}return $c22; }
    } public function c23() { $res = $this->db->prepare("SELECT count(gm) as 'totalc23' FROM pokedex where gm='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $c23[] = $c["totalc23"];}return $c23; }
    } public function getTipo() { $res = $this->db->prepare("SELECT * FROM pokedex where tipo1 = ? or tipo2 = ?");
        $res->bindParam(1, $_POST["tipov"]); $res->bindParam(2, $_POST["tipov"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getregiones() {
        $res = $this->db->prepare("SELECT * FROM pokedex where region = ?"); $res->bindParam(1, $_POST["regionv"]);
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getLegendarios() { $res = $this->db->prepare("SELECT * FROM pokedex where tipopok='Legendario'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getSingulares() { $res = $this->db->prepare("SELECT * FROM pokedex where tipopok='Singular'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getMegaEv() { $res = $this->db->prepare("SELECT * FROM pokedex where me='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getFormasReg() { $res = $this->db->prepare("SELECT * FROM pokedex where fre='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    } public function getGigamax() { $res = $this->db->prepare("SELECT * FROM pokedex where gm='Si'");
        if ($res->execute()) { while ($c = $res->fetch(PDO::FETCH_ASSOC)) { $this->pokemon[] = $c; } return $this->pokemon; }
    }
}

?>
