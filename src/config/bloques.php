<?php

/*
 * Bloques disponibles para las misiones de KidsCode Lab.
 *
 * Cada nivel contiene los bloques que el jugador puede utilizar
 * para construir la solución de la misión.
 *
 * Algunos bloques son correctos y otros funcionan como
 * distractores para aumentar el desafío.
 */

return [

    // =========================================================
    // NIVEL 1: EL COHETE ESPACIAL
    // =========================================================
    1 => [

        [
            'id' => 'paso1',
            'texto' => '1. ⛽ Cargar Combustible',
            'tipo' => 'correcto',
            'color' => 'bg-blue-600 hover:bg-blue-500'
        ],

        [
            'id' => 'paso2',
            'texto' => '2. 👨‍🚀 Abrochar Cinturón',
            'tipo' => 'correcto',
            'color' => 'bg-cyan-600 hover:bg-cyan-500'
        ],

        [
            'id' => 'paso3',
            'texto' => '3. 🔥 Encender Motores',
            'tipo' => 'correcto',
            'color' => 'bg-amber-600 hover:bg-amber-500'
        ],

        [
            'id' => 'paso4',
            'texto' => '4. 🚀 ¡Iniciar Despegue!',
            'tipo' => 'correcto',
            'color' => 'bg-emerald-600 hover:bg-emerald-500'
        ],

        [
            'id' => 'dist1',
            'texto' => '🍕 Comer una Pizza',
            'tipo' => 'distractor',
            'color' => 'bg-rose-700 hover:bg-rose-600'
        ],

        [
            'id' => 'dist2',
            'texto' => '😴 Tomar una Siesta',
            'tipo' => 'distractor',
            'color' => 'bg-indigo-700 hover:bg-indigo-600'
        ],

    ],


    // =========================================================
    // NIVEL 2: EL ROBOT EXPLORADOR
    // =========================================================
    2 => [

        [
            'id' => 'bucle_inicio',
            'texto' => '1. 🔁 REPETIR 3 VECES:',
            'tipo' => 'correcto',
            'color' => 'bg-purple-600 hover:bg-purple-500'
        ],

        [
            'id' => 'bucle_avanzar',
            'texto' => '2. ➡️ └─ Avanzar 1 Paso',
            'tipo' => 'correcto',
            'color' => 'bg-blue-600 hover:bg-blue-500'
        ],

        [
            'id' => 'bucle_gema',
            'texto' => '3. 💎 └─ Recolectar Gema',
            'tipo' => 'correcto',
            'color' => 'bg-cyan-600 hover:bg-cyan-500'
        ],

        [
            'id' => 'bucle_mochila',
            'texto' => '4. 🎒 Guardar en Mochila',
            'tipo' => 'correcto',
            'color' => 'bg-emerald-600 hover:bg-emerald-500'
        ],

        [
            'id' => 'dist_robot1',
            'texto' => '🛑 Apagar Robot',
            'tipo' => 'distractor',
            'color' => 'bg-slate-600 hover:bg-slate-500'
        ],

        [
            'id' => 'dist_robot2',
            'texto' => '💃 Bailar Festejo',
            'tipo' => 'distractor',
            'color' => 'bg-pink-600 hover:bg-pink-500'
        ],

    ],


    // =========================================================
    // NIVEL 3: LA PUERTA SECRETA
    // =========================================================
    3 => [

        [
            'id' => 'if_dorada',
            'texto' => '🔑 SI (Llave == Dorada)',
            'tipo' => 'correcto',
            'color' => 'bg-amber-600 hover:bg-amber-500'
        ],

        [
            'id' => 'then_abrir',
            'texto' => '🔓 ENTONCES -> Abrir Puerta',
            'tipo' => 'correcto',
            'color' => 'bg-emerald-600 hover:bg-emerald-500'
        ],

        [
            'id' => 'if_plateada',
            'texto' => '🗝️ SI (Llave == Plateada)',
            'tipo' => 'incorrecto',
            'color' => 'bg-slate-600 hover:bg-slate-500'
        ],

        [
            'id' => 'then_cerrar',
            'texto' => '🔒 ENTONCES -> Quedar Cerrado',
            'tipo' => 'incorrecto',
            'color' => 'bg-zinc-600 hover:bg-zinc-500'
        ],

        [
            'id' => 'if_dragon',
            'texto' => '🐉 SI (Llave == Juguete) -> Despertar Dragón',
            'tipo' => 'distractor',
            'color' => 'bg-rose-700 hover:bg-rose-600'
        ],

        [
            'id' => 'if_trampa',
            'texto' => '💣 SI (Llave == Oxidada) -> Activar Trampa',
            'tipo' => 'distractor',
            'color' => 'bg-purple-700 hover:bg-purple-600'
        ],

    ],

];