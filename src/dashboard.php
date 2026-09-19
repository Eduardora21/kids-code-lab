<?php

// Cargamos la clase que representa las lecciones.
require_once __DIR__ . '/classes/Leccion.php';

// Todos los niveles se obtienen desde un único archivo de configuración.
// Más adelante esta información vendrá desde la base de datos.
$nivelesConfig = require __DIR__ . '/config/niveles.php';

$lecciones = [];

// Convertimos la configuración de cada nivel en objetos Leccion.
// Esto nos permite trabajar con los datos de una manera más ordenada.
foreach ($nivelesConfig as $nivel) {
    $lecciones[] = new Leccion(
        $nivel['id'],
        $nivel['titulo'],
        $nivel['descripcion'],
        $nivel['dificultad'],
        $nivel['pasos'],
        $nivel['icono'],
        $nivel['xp']
    );
}

// Por ahora el progreso es temporal.
// Cuando tengamos usuarios y base de datos, estos valores serán dinámicos.
$nivelActual = 1;
$xpActual = 0;
$xpSiguienteNivel = 300;

// Calculamos el porcentaje para mostrarlo en la barra de progreso.
$porcentajeProgreso = ($xpActual / $xpSiguienteNivel) * 100;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>KidsCode Lab | Aventuras de programación</title>

    <!--
        Tailwind nos permite construir rápidamente la interfaz.
        Más adelante podemos compilarlo localmente si queremos preparar
        el proyecto para producción.
    -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos propios del proyecto -->
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <!-- ======================================================
         ENCABEZADO
         ====================================================== -->

    <header class="bg-white border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo / nombre de la plataforma -->
            <a href="dashboard.php" class="flex items-center gap-3">

                <div
                    class="w-11 h-11 rounded-2xl bg-indigo-600
                           flex items-center justify-center text-2xl
                           shadow-sm"
                >
                    💻
                </div>

                <div>
                    <h1 class="text-xl font-black text-slate-900 leading-tight">
                        KidsCode Lab
                    </h1>

                    <p class="text-xs text-slate-500">
                        Aprende jugando
                    </p>
                </div>

            </a>

            <!--
                Este perfil es solamente visual por ahora.
                Cuando implementemos autenticación mostrará
                los datos del niño que inició sesión.
            -->
            <div class="flex items-center gap-3">

                <div class="hidden sm:block text-right">

                    <p class="text-sm font-bold">
                        Explorador
                    </p>

                    <p class="text-xs text-slate-500">
                        Nivel <?= $nivelActual ?>
                    </p>

                </div>

                <div
                    class="w-11 h-11 rounded-full bg-amber-100
                           flex items-center justify-center text-2xl
                           border-2 border-amber-300"
                >
                    🧑‍🚀
                </div>

            </div>

        </div>

    </header>


    <main class="max-w-7xl mx-auto px-6 py-10">

        <!-- ==================================================
             BIENVENIDA
             ================================================== -->

        <section
            class="relative overflow-hidden rounded-3xl
                   bg-gradient-to-r from-indigo-600 to-violet-600
                   text-white p-8 md:p-10 shadow-lg mb-10"
        >

            <!-- Elementos decorativos -->
            <div
                class="absolute -top-10 -right-10
                       text-9xl opacity-10 select-none"
            >
                🚀
            </div>

            <div
                class="absolute -bottom-10 right-32
                       text-8xl opacity-10 select-none"
            >
                👾
            </div>


            <div class="relative max-w-2xl">

                <span
                    class="inline-flex bg-white/15 border border-white/20
                           px-4 py-1.5 rounded-full text-sm font-bold mb-4"
                >
                    🌱 Mundo 1 · Aventureros del Código
                </span>

                <h2 class="text-3xl md:text-4xl font-black mb-3">
                    ¡Tu aventura comienza aquí! 🚀
                </h2>

                <p class="text-indigo-100 text-lg leading-relaxed">
                    Resuelve misiones, aprende a programar y conviértete
                    poco a poco en un verdadero maestro del código.
                </p>

            </div>

        </section>


        <!-- ==================================================
             PROGRESO DEL JUGADOR
             ================================================== -->

        <section
            class="bg-white border border-slate-200
                   rounded-3xl p-6 shadow-sm mb-10"
        >

            <div
                class="flex flex-col md:flex-row md:items-center
                       md:justify-between gap-5"
            >

                <div>

                    <p
                        class="text-xs uppercase tracking-widest
                               font-bold text-indigo-600 mb-1"
                    >
                        Tu progreso
                    </p>

                    <h3 class="text-xl font-black text-slate-900">
                        Explorador de Código
                    </h3>

                </div>


                <!-- Estadísticas rápidas -->
                <div class="flex gap-6">

                    <div>
                        <p class="text-xs text-slate-500">
                            Experiencia
                        </p>

                        <p class="font-black text-lg">
                            ⭐ <?= $xpActual ?> XP
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">
                            Misiones
                        </p>

                        <p class="font-black text-lg">
                            🎯 0 / <?= count($lecciones) ?>
                        </p>
                    </div>

                </div>

            </div>


            <!-- Barra de experiencia -->
            <div class="mt-6">

                <div
                    class="flex justify-between text-sm
                           font-semibold text-slate-500 mb-2"
                >
                    <span>Nivel <?= $nivelActual ?></span>

                    <span>
                        <?= $xpActual ?> / <?= $xpSiguienteNivel ?> XP
                    </span>
                </div>


                <div
                    class="w-full h-3 bg-slate-100
                           rounded-full overflow-hidden"
                >

                    <div
                        class="h-full bg-gradient-to-r
                               from-indigo-500 to-violet-500
                               rounded-full transition-all duration-500"
                        style="width: <?= $porcentajeProgreso ?>%"
                    >
                    </div>

                </div>

            </div>

        </section>


        <!-- ==================================================
             MAPA DE MISIONES
             ================================================== -->

        <section>

            <div
                class="flex flex-col sm:flex-row sm:items-end
                       sm:justify-between gap-3 mb-6"
            >

                <div>

                    <p
                        class="text-sm font-bold text-indigo-600
                               uppercase tracking-wider"
                    >
                        Mundo 1
                    </p>

                    <h2
                        class="text-2xl md:text-3xl
                               font-black text-slate-900"
                    >
                        🌱 Aventureros del Código
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Completa las misiones y descubre cómo piensa
                        un programador.
                    </p>

                </div>


                <div
                    class="bg-emerald-50 text-emerald-700
                           px-4 py-2 rounded-xl text-sm font-bold"
                >
                    Principiante
                </div>

            </div>


            <!-- Tarjetas de las misiones -->
            <div
                class="grid grid-cols-1 md:grid-cols-2
                       lg:grid-cols-3 gap-6"
            >

                <?php foreach ($lecciones as $indice => $leccion): ?>

                    <?php

                    /*
                     * Por ahora dejamos disponible únicamente la primera
                     * misión para representar cómo funcionará el desbloqueo.
                     *
                     * Después este estado dependerá del progreso real
                     * almacenado para cada usuario.
                     */
                    $bloqueado = $indice > 0;

                    ?>

                    <article
                        class="group relative bg-white border
                               border-slate-200 rounded-3xl p-6
                               transition duration-300
                               <?= $bloqueado
                                   ? 'opacity-70'
                                   : 'hover:-translate-y-1 hover:shadow-xl'
                               ?>"
                    >

                        <!-- Número de misión -->
                        <div
                            class="absolute top-5 right-5
                                   text-xs font-black text-slate-400"
                        >
                            MISIÓN <?= $leccion->getId() ?>
                        </div>


                        <!-- Icono principal -->
                        <div
                            class="w-16 h-16 rounded-2xl
                                   <?= $bloqueado
                                       ? 'bg-slate-100'
                                       : 'bg-indigo-50'
                                   ?>
                                   flex items-center justify-center
                                   text-4xl mb-5"
                        >
                            <?= htmlspecialchars($leccion->getIcono()) ?>
                        </div>


                        <h3
                            class="text-xl font-black
                                   text-slate-900 mb-2"
                        >
                            <?= htmlspecialchars($leccion->getTitulo()) ?>
                        </h3>


                        <p
                            class="text-slate-500 leading-relaxed
                                   min-h-[72px]"
                        >
                            <?= htmlspecialchars(
                                $leccion->getDescripcion()
                            ) ?>
                        </p>


                        <!-- Información de la misión -->
                        <div
                            class="flex items-center justify-between
                                   mt-6 pt-5 border-t border-slate-100"
                        >

                            <div class="flex gap-4 text-sm">

                                <span
                                    class="text-slate-500"
                                    title="Cantidad de pasos"
                                >
                                    🧩 <?= $leccion->getPasos() ?>
                                </span>

                                <span
                                    class="font-bold text-amber-600"
                                    title="Experiencia que puedes ganar"
                                >
                                    ⭐ <?= $leccion->getXp() ?> XP
                                </span>

                            </div>

                        </div>


                        <!-- Acción de la tarjeta -->
                        <div class="mt-5">

                            <?php if (!$bloqueado): ?>

                                <a
                                    href="index.php?nivel=<?= $leccion->getId() ?>"
                                    class="flex items-center justify-center
                                           w-full bg-indigo-600
                                           hover:bg-indigo-700 text-white
                                           font-black py-3 rounded-xl
                                           transition"
                                >
                                    Jugar misión 🚀
                                </a>

                            <?php else: ?>

                                <button
                                    type="button"
                                    disabled
                                    class="flex items-center justify-center
                                           w-full bg-slate-100
                                           text-slate-400 font-bold
                                           py-3 rounded-xl cursor-not-allowed"
                                >
                                    🔒 Completa la misión anterior
                                </button>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </section>


        <!-- ==================================================
             PRÓXIMOS MUNDOS
             ================================================== -->

        <section class="mt-14">

            <h2 class="text-2xl font-black text-slate-900 mb-6">
                Más aventuras te esperan
            </h2>


            <div class="grid md:grid-cols-2 gap-6">

                <!-- Mundo intermedio -->
                <div
                    class="relative overflow-hidden bg-white
                           border border-slate-200 rounded-3xl
                           p-7"
                >

                    <span
                        class="inline-block text-xs font-black
                               uppercase tracking-widest
                               text-amber-600 mb-3"
                    >
                        Mundo 2
                    </span>

                    <h3 class="text-xl font-black mb-2">
                        ⚡ Maestros del Código
                    </h3>

                    <p class="text-slate-500">
                        Nuevos retos aparecerán cuando completes
                        tu primera aventura.
                    </p>

                    <div
                        class="absolute right-6 bottom-4
                               text-6xl opacity-10"
                    >
                        ⚡
                    </div>

                </div>


                <!-- Mundo avanzado -->
                <div
                    class="relative overflow-hidden bg-white
                           border border-slate-200 rounded-3xl
                           p-7"
                >

                    <span
                        class="inline-block text-xs font-black
                               uppercase tracking-widest
                               text-rose-600 mb-3"
                    >
                        Mundo 3
                    </span>

                    <h3 class="text-xl font-black mb-2">
                        🔥 Leyendas del Código
                    </h3>

                    <p class="text-slate-500">
                        Demuestra todo lo aprendido en las misiones
                        más desafiantes de KidsCode Lab.
                    </p>

                    <div
                        class="absolute right-6 bottom-4
                               text-6xl opacity-10"
                    >
                        🔥
                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- ======================================================
         PIE DE PÁGINA
         ====================================================== -->

    <footer class="mt-16 border-t border-slate-200 bg-white">

        <div
            class="max-w-7xl mx-auto px-6 py-7
                   text-center text-sm text-slate-400"
        >
            KidsCode Lab · Aprende, experimenta y crea 🚀
        </div>

    </footer>

</body>

</html>