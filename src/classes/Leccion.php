<?php

namespace KidsCodeLab;

class Leccion {
    private int $id;
    private string $titulo;
    private string $modulo;
    private string $icono;
    private string $descripcionServicio;
    private string $objetivo;
    private int $pasosRequeridos;

    public function __construct(
        int $id,
        string $titulo,
        string $modulo,
        string $icono,
        string $descripcionServicio,
        string $objetivo,
        int $pasosRequeridos = 3
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->modulo = $modulo;
        $this->icono = $icono;
        $this->descripcionServicio = $descripcionServicio;
        $this->objetivo = $objetivo;
        $this->pasosRequeridos = $pasosRequeridos;
    }

    public function getId(): int { return $this->id; }
    public function getTitulo(): string { return $this->titulo; }
    public function getModulo(): string { return $this->modulo; }
    public function getIcono(): string { return $this->icono; }
    public function getDescripcionServicio(): string { return $this->descripcionServicio; }
    public function getObjetivo(): string { return $this->objetivo; }
    public function getPasosRequeridos(): int { return $this->pasosRequeridos; }
}