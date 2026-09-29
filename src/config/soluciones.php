<?php

/*
 * Soluciones esperadas para las misiones de KidsCode Lab.
 *
 * Cada nivel define el orden correcto de los bloques
 * que debe construir el jugador para superar el reto.
 *
 * Mantener esta información fuera de JavaScript permitirá
 * que el motor del juego sea más reutilizable cuando
 * agreguemos nuevas misiones.
 */

return [

    // Nivel 1: El Cohete Espacial
    1 => [
        'pasosCorrectos' => [
            'paso1',
            'paso2',
            'paso3',
            'paso4'
        ],

        'distractores' => [
            'dist1',
            'dist2'
        ]
    ],


    // Nivel 2: El Robot Explorador
    2 => [
        'pasosCorrectos' => [
            'bucle_inicio',
            'bucle_avanzar',
            'bucle_gema',
            'bucle_mochila'
        ],

        'distractores' => [
            'dist_robot1',
            'dist_robot2'
        ]
    ],


    // Nivel 3: La Puerta Secreta
    3 => [
        'pasosCorrectos' => [
            'if_dorada',
            'then_abrir'
        ],

        'distractores' => [
            'if_dragon',
            'if_trampa'
        ]
    ]

];