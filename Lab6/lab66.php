<?php
    final class ClaseBase {
        public function test() {
            echo "ClaseBase::test() llamada\n";
        }
        //Aqui da igual si se declara el metodo como
        //final o no
        final public function moreTesting() {
            echo "ClaseBase::moreTesting() llamada\n";
        }
    }
    class ClaseHijo extends ClaseBase {
    }
?>