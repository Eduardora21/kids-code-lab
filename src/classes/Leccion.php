<?php

/*
 * Representa una misión o lección dentro de KidsCode Lab.
 *
 * Esta clase almacena la información principal de cada nivel
 * y permite acceder a sus datos desde diferentes partes
 * de la plataforma.
 */
class Leccion
{
    private int $id;
    private string $titulo;
    private string $descripcion;
    private string $dificultad;
    private string $concepto;
    private int $pasos;
    private string $icono;
    private int $xp;


    /*
     * Al crear una lección recibimos todos los datos
     * definidos previamente en config/niveles.php.
     */
    public function __construct(
        int $id,
        string $titulo,
        string $descripcion,
        string $dificultad,
        string $concepto,
        int $pasos,
        string $icono,
        int $xp
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->dificultad = $dificultad;
        $this->concepto = $concepto;
        $this->pasos = $pasos;
        $this->icono = $icono;
        $this->xp = $xp;
    }


    // Devuelve el identificador de la misión.
    public function getId(): int
    {
        return $this->id;
    }


    // Devuelve el nombre de la misión.
    public function getTitulo(): string
    {
        return $this->titulo;
    }


    // Devuelve una breve descripción del reto.
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }


    // Devuelve la dificultad asignada a la misión.
    public function getDificultad(): string
    {
        return $this->dificultad;
    }


    // Devuelve el concepto de programación que enseña la misión.
    public function getConcepto(): string
    {
        return $this->concepto;
    }


    // Devuelve la cantidad de pasos necesarios para resolver el reto.
    public function getPasos(): int
    {
        return $this->pasos;
    }


    // Devuelve el icono utilizado para representar la misión.
    public function getIcono(): string
    {
        return $this->icono;
    }


    // Devuelve la experiencia obtenida al completar la misión.
    public function getXp(): int
    {
        return $this->xp;
    }
}