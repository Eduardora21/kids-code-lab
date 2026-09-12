<?php
require_once __DIR__ . '/classes/Leccion.php';

use KidsCodeLab\Leccion;

// Catálogo de lecciones del sistema (POO)
$lecciones = [
    new Leccion(
        1,
        'Despegue del Cohete',
        'Módulo 1: Lógica Secuencial',
        'Aprende a darle instrucciones paso a paso a la computadora para lograr que un cohete despegue.',
        'Comprender qué es un algoritmo y la importancia del orden en las instrucciones.',
        '🚀',
        'leccion1.php',
        true
    ),
    new Leccion(
        2,
        'El Laberinto del Robot',
        'Módulo 2: Bucles y Repeticiones',
        'Guía a un pequeño robot para salir del laberinto usando comandos repetitivos.',
        'Aprender a optimizar código utilizando bucles simples (Repetir N veces).',
        '🤖',
        '#',
        false // Próximamente
    ),
    new Leccion(
        3,
        'El Semáforo Inteligente',
        'Módulo 3: Condiciones (Si / Sino)',
        'Ayuda a los autos a cruzar la calle cambiando el color del semáforo según el tráfico.',
        'Entender cómo la computadora toma decisiones basadas en condiciones.',
        '🚦',
        '#',
        false // Próximamente
    )
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsCode Lab - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between p-4 md:p-8 font-sans">
    
    <!-- HEADER -->
    <header class="max-w-5xl mx-auto w-full flex justify-between items-center pb-6 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <span class="text-4xl">🎮</span>
            <div>
                <h1 class="text-2xl font-bold text-yellow-400">KidsCode Lab</h1>
                <p class="text-xs text-slate-400">Plataforma Interactiva de Programación</p>
            </div>
        </div>
        <div class="bg-indigo-900/60 px-4 py-2 rounded-full border border-indigo-700/50 text-sm font-medium text-indigo-200 flex items-center gap-2">
            <span>⭐ Nivel: Principiante</span>
        </div>
    </header>

    <!-- MAIN DASHBOARD -->
    <main class="max-w-5xl mx-auto w-full my-8">
        <div class="mb-8 text-center md:text-left">
            <h2 class="text-3xl font-extrabold text-white">Selecciona tu Módulo de Aprendizaje</h2>
            <p class="text-slate-400 mt-1">Explora los bloques y completa los desafíos para convertirte en programador.</p>
        </div>

        <!-- GRID DE TARJETAS REDONDEADAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($lecciones as $item): ?>
                <div class="bg-slate-800/90 rounded-2xl border border-slate-700/80 p-6 flex flex-col justify-between hover:border-yellow-400/50 hover:shadow-2xl hover:-translate-y-1 transition duration-200 group relative overflow-hidden">
                    
                    <div>
                        <!-- Icono y Módulo -->
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-5xl group-hover:scale-110 transition duration-200"><?php echo $item->getIcono(); ?></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-slate-900 text-indigo-300 px-3 py-1 rounded-full border border-indigo-900">
                                <?php echo $item->getModulo(); ?>
                            </span>
                        </div>

                        <!-- Título -->
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-yellow-400 transition">
                            <?php echo $item->getTitulo(); ?>
                        </h3>

                        <!-- Descripción para qué sirve -->
                        <p class="text-slate-300 text-sm mb-4 leading-relaxed">
                            <?php echo $item->getDescripcion(); ?>
                        </p>

                        <!-- Idea / Objetivo del nivel -->
                        <div class="bg-slate-900/70 p-3 rounded-xl border border-slate-800 mb-6">
                            <span class="text-xs font-semibold text-yellow-400 block mb-1">🎯 ¿Cuál es la idea?</span>
                            <p class="text-xs text-slate-400"><?php echo $item->getObjetivo(); ?></p>
                        </div>
                    </div>

                    <!-- Botón de Entrada -->
                    <div>
                        <?php if ($item->isDisponible()): ?>
                            <a href="<?php echo $item->getArchivo(); ?>" class="w-full bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-3 px-4 rounded-xl shadow-lg transition duration-150 flex items-center justify-center gap-2 text-sm">
                                <span>¡Jugar Nivel!</span>
                                <span>➔</span>
                            </a>
                        <?php else: ?>
                            <button disabled class="w-full bg-slate-700 text-slate-400 font-bold py-3 px-4 rounded-xl cursor-not-allowed text-sm">
                                🔒 Próximamente
                            </button>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="max-w-5xl mx-auto w-full pt-6 border-t border-slate-800 text-center text-xs text-slate-500 flex flex-col md:flex-row justify-between items-center gap-2">
        <span>KidsCode Lab &copy; <?php echo date('Y'); ?> - Sistema Educativo para Niños y Principiantes</span>
        <span class="text-slate-600">Desarrollado con PHP & JavaScript</span>
    </footer>

</body>
</html>