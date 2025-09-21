<?php
namespace App;

class CiFail {
    public function run() {
        echo "CI test"  // ← pas de point-virgule, c'est exprès
    }
}
