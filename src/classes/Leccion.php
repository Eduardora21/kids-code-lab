<?php

namespace KidsCodeLab;

class Leccion {
    private string $titulo;
    private string $modulo;
    private int $pasosRequeridos;

    public function __construct(string $titulo, string $modulo, int $pasosRequeridos = 3) {
        $this->titulo = $titulo;
        $this->modulo = $modulo;
        $this->pasosRequeridos = $pasosRequeridos;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getModulo(): string {
        return $this->modulo;
    }

    public function getPasosRequeridos(): int {
        return $this->pasosRequeridos;
    }
}