<?php
    require_once('modelo.php');

    class noticia extends modeloCredencialesBD{
        protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;

        public function __construct(){
            parent::__construct();
        }

        public function consultar_noticias(){
            $instruccion = "CALL sp_listar_noticias()";

            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

                if(!$resultado){
                    echo "fallo al consultar las noticias";
                }
                else{
                    return $resultado;
                    $resultado->close();
                    $this->_db->close();
                }
        }

        public function consultar_noticias_filtro($campo,$valor){
            $instruccion = "CALL sp_listar_noticias_filtro('".$campo."','".$valor."')";
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_valor(){
            $instruccion = "CALL sp_consultar_valor()";
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
            if(!$resultado){
                echo "Fallo al consultar";
            }
            else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
        public function consultar_noticias_pag($lim, $os){
            $instruccion = "CALL sp_listar_noticias_pag('".$lim."','".$os."')";
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
            if($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
            else{
                echo "Fallo al consultar las noticias";
            }
        }

        public function incrementar(){
            $instruccion = "CALL sp_incremento()";
            $actualiza=$this->_db->query($instruccion);
            if ($actualiza){
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }
        public function decrementar(){
            $instruccion = "CALL sp_decremento()";
            $actualiza=$this->_db->query($instruccion);
            if ($actualiza){
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }
    }
?>