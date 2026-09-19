<?php

class Leccion
{
    private int $id;
    private string $titulo;
    private string $descripcion;
    private string $dificultad;
    private int $pasos;
    private string $icono;
    private int $xp;

    public function __construct(
        int $id,
        string $titulo,
        string $descripcion,
        string $dificultad,
        int $pasos,
        string $icono,
        int $xp
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->dificultad = $dificultad;
        $this->pasos = $pasos;
        $this->icono = $icono;
        $this->xp = $xp;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getDificultad(): string
    {
        return $this->dificultad;
    }

    public function getPasos(): int
    {
        return $this->pasos;
    }

    public function getIcono(): string
    {
        return $this->icono;
    }

    public function getXp(): int
    {
        return $this->xp;
    }
}