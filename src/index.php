<?php

/*
 * Página principal de las misiones de KidsCode Lab.
 *
 * Aquí se carga la misión seleccionada, se preparan sus bloques
 * y se muestra la interfaz del juego.
 */

require_once __DIR__ . '/classes/Leccion.php';

// Cargamos la configuración central de los niveles.
$nivelesConfig = require __DIR__ . '/config/niveles.php';

$lecciones = [];

/*
 * Convertimos cada nivel configurado en un objeto Leccion.
 * De esta forma dashboard.php e index.php utilizan la misma
 * información y evitamos mantener catálogos duplicados.
 */
foreach ($nivelesConfig as $nivel) {
    $lecciones[$nivel['id']] = new Leccion(
        $nivel['id'],
        $nivel['titulo'],
        $nivel['descripcion'],
        $nivel['dificultad'],
        $nivel['pasos'],
        $nivel['icono'],
        $nivel['xp']
    );
}


/*
 * Obtenemos el nivel solicitado desde la URL.
 *
 * Ejemplo:
 * index.php?nivel=2
 */
$idNivel = isset($_GET['nivel'])
    ? (int) $_GET['nivel']
    : 1;

// Si el nivel solicitado no existe, mostramos el nivel 1.
if (!isset($lecciones[$idNivel])) {
    $idNivel = 1;
}

// Lección que se mostrará en pantalla.
$leccionActual = $lecciones[$idNivel];


/*
 * Bloques disponibles para cada misión.
 *
 * Más adelante podremos mover esta configuración fuera de index.php,
 * pero por ahora la mantenemos aquí hasta terminar la reorganización
 * principal del juego.
 */
$bloquesPorNivel = [

    // ---------------------------------------------------------
    // NIVEL 1: Lógica secuencial
    // ---------------------------------------------------------
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


    // ---------------------------------------------------------
    // NIVEL 2: Bucles y repeticiones
    // ---------------------------------------------------------
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


    // ---------------------------------------------------------
    // NIVEL 3: Condicionales
    // ---------------------------------------------------------
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
    ]
];


// Obtenemos los bloques correspondientes a la misión actual.
$bloquesActuales = $bloquesPorNivel[$idNivel];

// Los bloques aparecen desordenados cada vez que inicia la misión.
shuffle($bloquesActuales);


/*
 * Nombre del concepto que se mostrará en el encabezado.
 *
 * Por ahora depende del nivel. Más adelante podremos añadir
 * este dato directamente a la configuración de niveles.
 */
$conceptosPorNivel = [
    1 => 'Lógica Secuencial',
    2 => 'Bucles y Repeticiones',
    3 => 'Condicionales (Si / Sino)'
];

$conceptoActual = $conceptosPorNivel[$idNivel];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        KidsCode Lab - <?= htmlspecialchars($leccionActual->getTitulo()) ?>
    </title>

    <!-- Logo utilizado como icono de la pestaña -->
    <link
        rel="icon"
        type="image/png"
        href="public/img/logo.png"
    >

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos personalizados -->
    <link
        rel="stylesheet"
        href="public/css/styles.css"
    >

</head>


<body
    class="bg-slate-900
           text-slate-100
           min-h-screen
           flex flex-col
           justify-between
           p-4 md:p-8
           font-sans"
>


    <!-- =====================================================
         ENCABEZADO DE LA MISIÓN
         ===================================================== -->

    <header class="max-w-4xl mx-auto w-full mb-2">

        <div
            class="bg-gradient-to-r
                   from-indigo-900
                   via-slate-800
                   to-purple-900
                   rounded-2xl
                   p-4
                   border-2
                   border-indigo-500/40
                   shadow-[0_0_20px_rgba(99,102,241,0.2)]
                   flex flex-wrap
                   justify-between
                   items-center
                   gap-4
                   relative
                   overflow-hidden"
        >

            <!-- Decoración del fondo -->
            <div
                class="absolute
                       -top-10 -right-10
                       w-32 h-32
                       bg-yellow-400/10
                       rounded-full
                       blur-2xl
                       pointer-events-none"
            >
            </div>


            <!-- Información principal de la misión -->
            <div class="flex items-center gap-3 z-10">

                <!-- Regreso al dashboard -->
                <a
                    href="dashboard.php"
                    class="group
                           bg-slate-900/90
                           hover:bg-yellow-400
                           text-slate-300
                           hover:text-slate-950
                           font-black
                           px-3 py-2
                           rounded-xl
                           border
                           border-slate-700
                           hover:border-yellow-300
                           transition-all
                           duration-200
                           flex items-center
                           gap-2
                           text-xs
                           shadow-md"
                >
                    <span
                        class="group-hover:-translate-x-1
                               transition-transform"
                    >
                        ⬅️
                    </span>

                    <span>MENÚ</span>
                </a>


                <!-- Nombre e icono de la misión -->
                <div
                    class="flex
                           items-center
                           gap-2.5
                           bg-slate-900/60
                           px-3.5 py-2
                           rounded-xl
                           border
                           border-slate-700/80"
                >

                    <span class="text-3xl animate-bounce">
                        <?= htmlspecialchars($leccionActual->getIcono()) ?>
                    </span>

                    <div>

                        <span
                            class="text-[10px]
                                   font-black
                                   tracking-widest
                                   text-yellow-400
                                   uppercase
                                   block
                                   leading-none
                                   mb-1"
                        >
                            MISIÓN ACTUAL
                        </span>

                        <h1
                            class="text-lg
                                   font-black
                                   text-white
                                   leading-none
                                   tracking-wide
                                   drop-shadow-md"
                        >
                            <?= htmlspecialchars($leccionActual->getTitulo()) ?>
                        </h1>

                    </div>

                </div>

            </div>


            <!-- Concepto y número del nivel -->
            <div class="flex items-center gap-2 z-10">

                <div
                    class="bg-slate-900/80
                           border
                           border-indigo-500/50
                           px-3 py-1.5
                           rounded-xl
                           flex items-center
                           gap-2
                           shadow-inner"
                >

                    <span
                        class="w-2 h-2
                               rounded-full
                               bg-emerald-400
                               animate-pulse"
                    >
                    </span>

                    <span
                        class="text-xs
                               font-bold
                               text-indigo-200"
                    >
                        <?= htmlspecialchars($conceptoActual) ?>
                    </span>

                </div>


                <div
                    class="hidden sm:flex
                           bg-yellow-400/10
                           border
                           border-yellow-400/30
                           text-yellow-300
                           font-extrabold
                           text-xs
                           px-3 py-1.5
                           rounded-xl
                           items-center
                           gap-1"
                >
                    <span>⭐</span>

                    <span>
                        NIVEL <?= $leccionActual->getId() ?>
                    </span>
                </div>

            </div>

        </div>

    </header>



    <!-- =====================================================
         ÁREA PRINCIPAL DEL JUEGO
         ===================================================== -->

    <main
        class="max-w-4xl
               mx-auto
               w-full
               my-6
               grid
               grid-cols-1
               md:grid-cols-2
               gap-6
               items-start"
    >


        <!-- =================================================
             PANEL DE BLOQUES
             ================================================= -->

        <div
            class="bg-slate-800/80
                   p-5
                   rounded-2xl
                   border
                   border-slate-700/60
                   shadow-xl"
        >

            <div class="flex justify-between items-center mb-2">

                <h2
                    class="text-base
                           font-bold
                           text-white
                           flex items-center
                           gap-2"
                >
                    <span>🧩</span>
                    Bloques Disponibles
                </h2>

                <span
                    class="text-xs
                           text-yellow-400/80
                           bg-slate-900
                           px-2 py-1
                           rounded
                           border
                           border-slate-700"
                >
                    🔀 Desordenados
                </span>

            </div>


            <p class="text-slate-400 text-xs mb-3">
                Selecciona los bloques en el orden correcto
                para resolver el reto:
            </p>


            <!-- Bloques disponibles -->
            <div class="space-y-2">

                <?php foreach ($bloquesActuales as $bloque): ?>

                    <button
                        onclick="agregarComando(
                            <?= htmlspecialchars(
                                json_encode($bloque['texto']),
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>,
                            <?= htmlspecialchars(
                                json_encode($bloque['id']),
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        )"
                        class="w-full
                               <?= htmlspecialchars($bloque['color']) ?>
                               text-white
                               font-bold
                               py-2.5 px-3
                               rounded-xl
                               shadow
                               transition
                               text-left
                               text-xs
                               flex
                               justify-between
                               items-center"
                    >

                        <span>
                            <?= htmlspecialchars($bloque['texto']) ?>
                        </span>

                        <span
                            class="text-[10px]
                                   bg-black/30
                                   px-2 py-0.5
                                   rounded"
                        >
                            + Agregar
                        </span>

                    </button>

                <?php endforeach; ?>

            </div>


            <!-- Secuencia creada por el jugador -->
            <div class="mt-5 pt-3 border-t border-slate-700">

                <h3
                    class="text-xs
                           font-semibold
                           text-slate-300
                           mb-2
                           flex
                           justify-between
                           items-center"
                >

                    <span>
                        Tu Secuencia de Código:
                    </span>

                    <span
                        id="contador-pasos"
                        class="text-yellow-400 text-[11px]"
                    >
                        0 / <?= $leccionActual->getPasos() ?> pasos
                    </span>

                </h3>


                <div
                    id="contenedor-secuencia"
                    class="min-h-[90px]
                           bg-slate-900/80
                           rounded-xl
                           p-2.5
                           border
                           border-slate-700
                           space-y-1.5
                           flex
                           flex-col
                           justify-center
                           items-center
                           text-slate-500
                           text-xs"
                >
                    Haz clic en los bloques arriba para construir tu código.
                </div>

            </div>


            <!-- Acciones del jugador -->
            <div class="flex gap-2 mt-4">

                <button
                    onclick="ejecutarAlgoritmo()"
                    class="flex-1
                           bg-yellow-400
                           hover:bg-yellow-300
                           text-slate-950
                           font-extrabold
                           py-2.5
                           rounded-xl
                           shadow-lg
                           transition
                           text-sm"
                >
                    ▶ Ejecutar Código
                </button>


                <button
                    onclick="reiniciar()"
                    class="bg-slate-700
                           hover:bg-slate-600
                           text-slate-300
                           font-medium
                           px-3
                           rounded-xl
                           transition
                           text-xs"
                >
                    🔄 Limpiar
                </button>

            </div>

        </div>



        <!-- =================================================
             ESCENARIO DE LA MISIÓN
             ================================================= -->

        <div
            class="bg-slate-800/80
                   p-5
                   rounded-2xl
                   border
                   border-slate-700/60
                   shadow-xl
                   flex flex-col
                   items-center
                   justify-between
                   min-h-[420px]"
        >

            <h2
                class="text-base
                       font-bold
                       text-white
                       w-full
                       text-left
                       flex
                       items-center
                       gap-2"
            >
                <span>🖥️</span>
                Escenario
            </h2>


            <div
                class="relative
                       w-full
                       flex
                       flex-col
                       items-center
                       justify-end
                       h-56
                       overflow-hidden
                       border-b-2
                       border-slate-600
                       pb-2"
            >

                <!-- Escenario del cohete -->
                <?php if ($leccionActual->getId() === 1): ?>

                    <div
                        id="cohete"
                        class="text-7xl
                               transition-transform
                               duration-500"
                    >
                        🚀
                    </div>

                    <div
                        id="humo"
                        class="hidden
                               text-2xl
                               animate-bounce"
                    >
                        🔥💨
                    </div>


                <!-- Escenario del robot -->
                <?php elseif ($leccionActual->getId() === 2): ?>

                    <div class="flex items-center gap-6 text-5xl">

                        <div
                            id="robot"
                            class="transition-all duration-500"
                        >
                            🤖
                        </div>

                        <div
                            id="gemas"
                            class="text-2xl"
                        >
                            💎💎💎
                        </div>

                    </div>


                <!-- Escenario de la puerta -->
                <?php elseif ($leccionActual->getId() === 3): ?>

                    <div
                        id="puerta"
                        class="text-7xl
                               transition-all
                               duration-500"
                    >
                        🚪🔒
                    </div>

                <?php endif; ?>

            </div>


            <!-- Consola del juego -->
            <div
                id="consola"
                class="w-full
                       bg-slate-950
                       p-3
                       rounded-lg
                       border
                       border-slate-800
                       font-mono
                       text-xs
                       text-emerald-400
                       h-24
                       overflow-y-auto
                       leading-relaxed
                       mt-3"
            >
                &gt; Esperando código para
                <?= htmlspecialchars($leccionActual->getTitulo()) ?>...
            </div>

        </div>

    </main>



    <!-- =====================================================
         PIE DE PÁGINA
         ===================================================== -->

    <footer class="text-center text-xs text-slate-500">

        KidsCode Lab &copy;
        <?= date('Y') ?>
        - Aprendizaje de Lógica de Programación

    </footer>



    <!-- =====================================================
         LÓGICA TEMPORAL DEL JUEGO

         En el siguiente paso moveremos esta lógica a un archivo
         JavaScript independiente.
         ===================================================== -->

    <!--
    PHP envía únicamente los datos que JavaScript necesita
    para ejecutar la misión seleccionada.
-->
<script>
    const nivelActual = <?= $leccionActual->getId() ?>;
    const pasosRequeridos = <?= $leccionActual->getPasos() ?>;
</script>

<!-- Lógica principal de las misiones -->
<script src="public/js/juego.js"></script>

</body>

</html>