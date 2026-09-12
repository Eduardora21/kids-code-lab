<?php

namespace KidsCodeLab;

class Leccion {
    private int $id;
    private string $titulo;
    private string $modulo;
    private string $descripcion;
    private string $objetivo;
    private string $icono;
    private string $archivo;
    private bool $disponible;

    public function __construct(
        int $id,
        string $titulo,
        string $modulo,
        string $descripcion,
        string $objetivo,
        string $icono,
        string $archivo,
        bool $disponible = true
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->modulo = $modulo;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->icono = $icono;
        $this->archivo = $archivo;
        $this->disponible = $disponible;
    }

    public function getId(): int { return $this->id; }
    public function getTitulo(): string { return $this->titulo; }
    public function getModulo(): string { return $this->modulo; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getObjetivo(): string { return $this->objetivo; }
    public function getIcono(): string { return $this->icono; }
    public function getArchivo(): string { return $this->archivo; }
    public function isDisponible(): bool { return $this->disponible; }
}