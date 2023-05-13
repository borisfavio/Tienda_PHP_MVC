<?php
	class Producto{
		private $idp;
		private $idc;
		private $idpr;
		private $nom;
		private $des;
		private $coc;
		private $cov;
		private $sto;
		private $fec;
		private $est;
		private $ima;

		public function __construct($ip,$ic,$ipr,$no,$de,$cc,$cv,$st,$fe,$es,$im){
			$this->idp=$ip;
			$this->idc=$ic;
			$this->idpr=$ipr;
			$this->nom=$no;
			$this->des=$de;
			$this->coc=$cc;
			$this->cov=$cv;
			$this->sto=$st;
			$this->fec=$fe;
			$this->est=$es;
			$this->ima=$im;
		}

		public function grabarProducto(){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("INSERT INTO producto(id_categoria, id_proveedor, nombreproducto, descripcion, costocompra, costoventa, stock, fecha, estado, imagen_producto) VALUES ('$this->idc','$this->idpr','$this->nom', '$this->des','$this->coc','$this->cov','$this->sto','$this->fec','$this->est','$this->ima')");
			return($sql);
		}

		public function autocompleteProducto(){
			include("conexion.php");
			$db = new Conexion();
			$datos = array();
			$sql = $db->query("SELECT * FROM producto WHERE nombreproducto LIKE '%".$this->nom."%' ");
		    while($row = mysqli_fetch_array($sql)){
		        $datos[] = array("value" => $row['nombreproducto'],
		        	"id_prod" => $row['id'],
		        	"id_cate" => $row['id_categoria'],
		        	"id_prov" => $row['id_proveedor'],
		        	"desc" => $row['descripcion'],
		        	"costoc" => $row['costocompra'],
		        	"costov" => $row['costoventa'],
		        	"stoc" => $row['stock'],
		        	"fec" => $row['fecha'],
		        	"est" => $row['estado'],
		            "imgpro" => $row['imagen_producto']
		        );
		    }
			header('Content-Type: text/json; charset=UTF-8');
			echo json_encode($datos); 
		}

		public function editarStockProducto($id,$stock){
			$db = new Conexion();
			$sql = $db->query("UPDATE producto SET stock='$stock' where id = '$id'");
			return($sql);
		}

		public function listarProducto(){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM producto p
				INNER JOIN categoria c 
				ON p.id_categoria = c.id_categoria

				INNER JOIN proveedor pr
				ON p.id_proveedor = pr.id_proveedor

				ORDER BY nombreproducto ASC
				");
			return($sql);
		}


		public function verificaImagen($img){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM producto WHERE imagen_producto='$img'");
			$can = mysqli_num_rows($sql);
			return($can);


		}


		public function listarProductoId(){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM producto WHERE id='$this->idp'");
			return($sql);
		}


		public function editarProducto($id,$ca,$prov,$nom,$de,$cco,$cve,$sto,$fe,$es,$img){
			$db = new Conexion();
			$sql = $db->query("UPDATE producto SET id_categoria='$ca', id_proveedor='$prov', nombreproducto='$nom', descripcion='$de', costocompra='$cco', costoventa='$cve', stock='$sto', fecha='$fe', estado='$es', imagen_producto='$img' where id = '$id'");
			return($sql);
		}

		public function reporte(){
			include("conexion.php");
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM producto p
				INNER JOIN categoria c 
				ON p.id_categoria = c.id_categoria

				INNER JOIN proveedor pr
				ON p.id_proveedor = pr.id_proveedor

				ORDER BY nombreproducto ASC
				");
			return($sql);
		}	

		public function eliminarProducto(){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("DELETE from producto where id = '$this->idp'");
			return($sql);
		}


		public function buscarProducto(){
			require_once("conexion.php");
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM producto p
				INNER JOIN categoria c 
				ON p.id_categoria = c.id_categoria

				INNER JOIN proveedor pr
				ON p.id_proveedor = pr.id_proveedor
				
				WHERE p.nombreproducto LIKE '%$this->nom%'
				ORDER BY nombreproducto ASC
				");
			return($sql);
		}


		//get and set
		public function setIdp($idp){
			$this->idp=$idp;
		}

		public function getIdp(){
			return $this->idp;
		}

		public function setIdc($idc){
			$this->idc=$idc;
		}

		public function getIdc(){
			return $this->idc;
		}

		public function setIdpr($idprov){
			$this->idpr=$idprov;
		}

		public function getIdpr(){
			return $this->idpr;
		}

		public function setNom($no){
			$this->nom=$no;
		}

		public function getNom(){
			return $this->nom;
		}

		public function setDes($de){
			$this->des=$de;
		}

		public function getDes(){
			return $this->des;
		}

		public function setCoc($coc){
			$this->coc=$coc;
		}

		public function getCoc(){
			return $this->coc;
		}

		public function setCov($cov){
			$this->cov=$cov;
		}

		public function getCov(){
			return $this->cov;
		}

		public function setStoc($st){
			$this->sto=$st;
		}

		public function getStoc(){
			return $this->sto;
		}

		public function setFec($f){
			$this->fec=$f;
		}
		
		public function getFec(){
			return $this->fec;
		}

		public function setEst($e){
			$this->est=$e;
		}
		
		public function getEst(){
			return $this->est;
		}

		public function setImg($im){
			$this->ima=$im;
		}
		
		public function getImg(){
			return $this->ima;
		}		
	}
?>