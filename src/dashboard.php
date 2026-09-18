<?php
require_once __DIR__ . '/classes/Leccion.php';

use KidsCodeLab\Leccion;

$niveles = [
    new Leccion(
        1,
        'El Cohete Espacial',
        'Módulo 1: Lógica Secuencial',
        '🚀',
        'Sirve para aprender la importancia del orden en que se ejecutan los comandos.',
        'Organizar las 3 instrucciones de despegue en la secuencia correcta.',
        3
    ),
    new Leccion(
        2,
        'El Robot Explorador',
        'Módulo 2: Bucles y Repeticiones',
        '🤖',
        'Sirve para entender cómo repetir acciones automáticamente sin repetir código.',
        'Programar al robot para que avance colectando gemas usando bucles.',
        3
    ),
    new Leccion(
        3,
        'La Puerta Secreta',
        'Módulo 3: Condicionales (Si / Sino)',
        '🔑',
        'Sirve para que la computadora aprenda a tomar decisiones según el entorno.',
        'Usar la llave correcta para decidir si la puerta del castillo se abre.',
        1
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
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between p-4 md:p-8 font-sans">

   <!-- BANNER HERO INTEGRADO -->
    <header class="max-w-6xl mx-auto w-full bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 rounded-3xl border border-indigo-500/30 p-6 md:p-8 mb-8 shadow-2xl relative overflow-hidden">
        
        <!-- Adornos de fondo / luces resplandecientes -->
        <div class="absolute top-0 right-0 -mt-8 -mr-8 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Barra Superior del Header -->
        <div class="flex justify-between items-center pb-6 border-b border-slate-700/50 relative z-10">
            <div class="flex items-center gap-3">
                <div class="bg-yellow-400 text-slate-950 p-2.5 rounded-2xl shadow-lg shadow-yellow-400/20 text-2xl font-bold">
                    🚀
                </div>
                <div>
                    <h1 class="text-2xl font-black text-white tracking-wide">
                        KidsCode <span class="text-yellow-400">Lab</span>
                    </h1>
                    <span class="text-xs text-indigo-300 font-medium">Plataforma Interactiva</span>
                </div>
            </div>

            <span class="bg-indigo-500/20 text-indigo-300 border border-indigo-400/30 text-xs font-bold px-3 py-1.5 rounded-full backdrop-blur-sm">
                🕹️ Panel Principal
            </span>
        </div>

        <!-- Titular / Bienvenida dentro del Hero -->
        <div class="pt-6 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-2">
                    ¡Elige tu Misión de Código! 👋
                </h2>
                <p class="text-slate-300 text-sm md:text-base max-w-xl">
                    Selecciona uno de los bloques de aprendizaje para dominar conceptos clave de lógica y programación mientras juegas.
                </p>
            </div>
            
            <div class="flex-shrink-0 bg-slate-800/80 border border-slate-700 p-4 rounded-2xl flex items-center gap-4 shadow-inner">
                <div class="text-3xl">🏆</div>
                <div>
                    <div class="text-xs text-slate-400 font-semibold uppercase">Progreso Global</div>
                    <div class="text-sm font-bold text-yellow-400">3 Módulos Disponibles</div>
                </div>
            </div>
        </div>

    </header>

    <main class="max-w-6xl mx-auto w-full my-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">¡Elige tu Misión de Código! 👋</h2>
            <p class="text-slate-400">Selecciona un bloque para aprender conceptos clave de programación jugando.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($niveles as $nivel): ?>
                <div class="bg-slate-800/90 rounded-2xl border border-slate-700/70 p-6 flex flex-col justify-between hover:border-yellow-400/50 hover:shadow-2xl hover:-translate-y-1 transition duration-200 group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-4xl group-hover:scale-110 transition duration-200">
                                <?php echo $nivel->getIcono(); ?>
                            </span>
                            <span class="text-xs font-semibold px-3 py-1 bg-slate-900/80 text-yellow-400 rounded-full border border-slate-700">
                                Bloque #<?php echo $nivel->getId(); ?>
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-1">
                            <?php echo $nivel->getTitulo(); ?>
                        </h3>
                        <p class="text-xs text-indigo-300 font-medium mb-4">
                            <?php echo $nivel->getModulo(); ?>
                        </p>

                        <div class="mb-3 bg-slate-900/60 p-3 rounded-xl border border-slate-800">
                            <span class="text-xs font-bold text-cyan-400 uppercase tracking-wide block mb-1">💡 ¿Para qué sirve?</span>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <?php echo $nivel->getDescripcionServicio(); ?>
                            </p>
                        </div>

                        <div class="mb-6 bg-slate-900/60 p-3 rounded-xl border border-slate-800">
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-wide block mb-1">🎯 Objetivo de la Misión</span>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <?php echo $nivel->getObjetivo(); ?>
                            </p>
                        </div>
                    </div>

                    <a href="index.php?nivel=<?php echo $nivel->getId(); ?>" class="w-full bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-3 rounded-xl text-center shadow-md transition duration-150 flex justify-center items-center gap-2">
                        <span>Iniciar Nivel</span>
                        <span>➡️</span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="max-w-6xl mx-auto w-full border-t border-slate-800 pt-6 text-center text-xs text-slate-500">
        KidsCode Lab &copy; <?php echo date('Y'); ?> - Sistema Educativo Interactivo
    </footer>

</body>
</html>