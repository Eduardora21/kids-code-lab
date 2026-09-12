<?php
require_once __DIR__ . '/classes/Leccion.php';

use KidsCodeLab\Leccion;

$leccionActual = new Leccion(
    1,
    'El Cohete',
    'Módulo 1: Lógica Secuencial',
    'Aprende a darle instrucciones paso a paso a la computadora.',
    'Comprender la secuencia de ejecución.',
    '🚀',
    'leccion1.php',
    true
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsCode Lab - <?php echo $leccionActual->getTitulo(); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between p-4 md:p-8 font-sans">
    
    <!-- HEADER CON BOTÓN DE REGRESO -->
    <header class="max-w-4xl mx-auto w-full flex justify-between items-center pb-6 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <a href="index.php" class="bg-slate-800 hover:bg-slate-700 text-slate-300 p-2 rounded-xl border border-slate-700 transition" title="Volver al Dashboard">
                ⬅ Volver
            </a>
            <h1 class="text-2xl font-bold text-yellow-400">KidsCode Lab</h1>
        </div>
        <div class="bg-indigo-900/60 px-4 py-1.5 rounded-full border border-indigo-700/50 text-sm font-medium text-indigo-200">
            <?php echo $leccionActual->getModulo(); ?>
        </div>
    </header>

    <!-- ÁREA DE JUEGO -->
    <main class="max-w-4xl mx-auto w-full my-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- PANEL IZQUIERDO: Bloques -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700/60 shadow-xl">
            <h2 class="text-lg font-bold mb-2 text-white flex items-center gap-2">
                <span>🧩</span> Bloques Disponibles
            </h2>
            <p class="text-slate-400 text-sm mb-4">Haz clic en los bloques en el orden correcto para preparar el despegue:</p>

            <div class="space-y-3">
                <button onclick="agregarComando('Cargar Combustible', 1)" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                    <span>1. ⛽ Cargar Combustible</span>
                    <span class="text-xs bg-blue-800 px-2 py-1 rounded">+ Agregar</span>
                </button>
                <button onclick="agregarComando('Encender Motores', 2)" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                    <span>2. 🔥 Encender Motores</span>
                    <span class="text-xs bg-amber-800 px-2 py-1 rounded">+ Agregar</span>
                </button>
                <button onclick="agregarComando('¡Despegar!', 3)" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                    <span>3. 🚀 ¡Despegar!</span>
                    <span class="text-xs bg-emerald-800 px-2 py-1 rounded">+ Agregar</span>
                </button>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-700">
                <h3 class="text-sm font-semibold text-slate-300 mb-3">Tu Algoritmo (Secuencia):</h3>
                <div id="contenedor-secuencia" class="min-h-[100px] bg-slate-900/80 rounded-xl p-3 border border-slate-700 space-y-2 flex flex-col justify-center items-center text-slate-500 text-sm">
                    No has agregado comandos todavía.
                </div>
            </div>

            <div class="flex gap-3 mt-4">
                <button onclick="ejecutarAlgoritmo()" class="flex-1 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-3 rounded-xl shadow-lg transition duration-200">
                    ▶ Ejecutar Código
                </button>
                <button onclick="reiniciar()" class="bg-slate-700 hover:bg-slate-600 text-slate-300 font-medium px-4 rounded-xl transition">
                    🔄 Limpiar
                </button>
            </div>
        </div>

        <!-- PANEL DERECHO: Visualizador -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700/60 shadow-xl flex flex-col items-center justify-between min-h-[420px]">
            <h2 class="text-lg font-bold text-white w-full text-left flex items-center gap-2">
                <span>🖥️</span> Escenario de Prueba
            </h2>

            <div class="relative w-full flex flex-col items-center justify-end h-64 overflow-hidden border-b-2 border-slate-600 pb-2">
                <div id="cohete" class="text-7xl transition-transform duration-500">
                    🚀
                </div>
                <div id="humo" class="hidden text-2xl animate-bounce">🔥💨</div>
            </div>

            <div id="consola" class="w-full bg-slate-950 p-3 rounded-lg border border-slate-800 font-mono text-xs text-emerald-400 h-20 overflow-y-auto">
                > Esperando secuencia de código...
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="text-center text-xs text-slate-500">
        KidsCode Lab &copy; <?php echo date('Y'); ?> - Sistema de Aprendizaje Interactivo
    </footer>

    <!-- LÓGICA JAVASCRIPT -->
    <script>
        let secuencia = [];

        function agregarComando(nombre, id) {
            if (secuencia.length >= 3) return;
            secuencia.push({ nombre, id });
            renderizarSecuencia();
        }

        function renderizarSecuencia() {
            const contenedor = document.getElementById('contenedor-secuencia');
            if (secuencia.length === 0) {
                contenedor.innerHTML = '<span class="text-slate-500 text-sm">No has agregado comandos todavía.</span>';
                return;
            }
            contenedor.innerHTML = secuencia.map((cmd, idx) => `
                <div class="w-full bg-slate-800 text-yellow-300 px-3 py-2 rounded-lg text-sm font-mono flex justify-between items-center border border-slate-700">
                    <span>${idx + 1}. ${cmd.nombre}</span>
                    <span class="text-xs text-slate-400">Paso ${idx + 1}</span>
                </div>
            `).join('');
        }

        function reiniciar() {
            secuencia = [];
            renderizarSecuencia();
            document.getElementById('cohete').classList.remove('rocket-launch');
            document.getElementById('humo').classList.add('hidden');
            document.getElementById('consola').innerHTML = '> Secuencia reiniciada. Esperando comandos...';
        }

        function ejecutarAlgoritmo() {
            const consola = document.getElementById('consola');
            const cohete = document.getElementById('cohete');
            const humo = document.getElementById('humo');

            if (secuencia.length < 3) {
                consola.innerHTML = '<span class="text-amber-400">> ⚠️ Tu algoritmo necesita 3 pasos para estar completo.</span>';
                return;
            }

            const esCorrecto = secuencia[0].id === 1 && secuencia[1].id === 2 && secuencia[2].id === 3;

            if (esCorrecto) {
                consola.innerHTML = '> ⛽ Combustible listo...<br>> 🔥 Motores encendidos...<br><span class="text-emerald-400 font-bold">> 🚀 ¡DESPEGUE EXITOSO!</span>';
                humo.classList.remove('hidden');
                setTimeout(() => { cohete.classList.add('rocket-launch'); }, 500);
            } else {
                consola.innerHTML = '<span class="text-rose-400">> ❌ ¡Ups! El orden de los pasos no es correcto.<br>> Pista: Primero carga combustible, luego enciende motores y finalmente despega.</span>';
            }
        }
    </script>
</body>
</html>