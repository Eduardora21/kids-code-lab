<?php

/*
 * Configuración general de las misiones de KidsCode Lab.
 *
 * Aquí almacenamos la información principal de cada nivel.
 * Esto permite mantener los datos centralizados y reutilizarlos
 * desde diferentes partes de la plataforma.
 */

return [

    // =========================================================
    // NIVEL 1: EL COHETE ESPACIAL
    // =========================================================
    1 => [
        'id' => 1,
        'titulo' => 'El Cohete Espacial',
        'descripcion' => 'Prepara el cohete siguiendo la secuencia correcta.',
        'dificultad' => 'Principiante',
        'concepto' => 'Lógica Secuencial',
        'pasos' => 4,
        'icono' => '🚀',
        'xp' => 100
    ],


    // =========================================================
    // NIVEL 2: EL ROBOT EXPLORADOR
    // =========================================================
    2 => [
        'id' => 2,
        'titulo' => 'El Robot Explorador',
        'descripcion' => 'Programa al robot para recoger todas las gemas.',
        'dificultad' => 'Principiante',
        'concepto' => 'Bucles y Repeticiones',
        'pasos' => 4,
        'icono' => '🤖',
        'xp' => 100
    ],


    // =========================================================
    // NIVEL 3: LA PUERTA SECRETA
    // =========================================================
    3 => [
        'id' => 3,
        'titulo' => 'La Puerta Secreta',
        'descripcion' => 'Utiliza condiciones para encontrar la llave correcta.',
        'dificultad' => 'Principiante',
        'concepto' => 'Condicionales (Si / Sino)',
        'pasos' => 2,
        'icono' => '🔑',
        'xp' => 100
    ]

];