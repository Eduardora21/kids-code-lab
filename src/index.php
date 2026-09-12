<?php
require_once __DIR__ . '/classes/Leccion.php';

use KidsCodeLab\Leccion;

// Catálogo de lecciones
$catalogoNiveles = [
    1 => new Leccion(
        1,
        'El Cohete Espacial',
        'Módulo 1: Lógica Secuencial',
        '🚀',
        'Sirve para aprender la importancia del orden en que se ejecutan los comandos.',
        'Organizar las 3 instrucciones de despegue en la secuencia correcta.',
        3
    ),
    2 => new Leccion(
        2,
        'El Robot Explorador',
        'Módulo 2: Bucles y Repeticiones',
        '🤖',
        'Sirve para entender cómo repetir acciones automáticamente (bucles FOR/WHILE).',
        'Programar al robot para repetir el avance 3 veces y recolectar las gemas.',
        3
    ),
    3 => new Leccion(
        3,
        'La Puerta Secreta',
        'Módulo 3: Condicionales (Si / Sino)',
        '🔑',
        'Sirve para que el programa tome decisiones según se cumpla o no una condición (IF/ELSE).',
        'Verificar si la llave en posesión es la dorada para abrir la puerta.',
        1
    )
];

// Obtener y validar el nivel seleccionado por URL (por defecto el Nivel 1)
$idNivel = isset($_GET['nivel']) ? (int)$_GET['nivel'] : 1;
if (!array_key_exists($idNivel, $catalogoNiveles)) {
    $idNivel = 1;
}
$leccionActual = $catalogoNiveles[$idNivel];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidsCode Lab - <?php echo $leccionActual->getTitulo(); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between p-4 md:p-8 font-sans">
    
    <!-- Encabezado con retorno al Dashboard mediante ruta relativa -->
    <header class="max-w-4xl mx-auto w-full flex justify-between items-center pb-6 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <a href="dashboard.php" class="bg-slate-800 hover:bg-slate-700 text-yellow-400 p-2 rounded-xl border border-slate-700 transition" title="Volver al Dashboard">
                ⬅️
            </a>
            <span class="text-3xl"><?php echo $leccionActual->getIcono(); ?></span>
            <h1 class="text-2xl font-bold text-yellow-400"><?php echo $leccionActual->getTitulo(); ?></h1>
        </div>
        <div class="bg-indigo-900/60 px-4 py-1.5 rounded-full border border-indigo-700/50 text-sm font-medium text-indigo-200">
            <?php echo $leccionActual->getModulo(); ?>
        </div>
    </header>

    <!-- Área principal del juego -->
    <main class="max-w-4xl mx-auto w-full my-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- PANEL IZQUIERDO: Bloques del Nivel Actual -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700/60 shadow-xl">
            <h2 class="text-lg font-bold mb-2 text-white flex items-center gap-2">
                <span>🧩</span> Bloques Disponibles
            </h2>
            <p class="text-slate-400 text-sm mb-4">Haz clic en los bloques para armar la lógica requerida:</p>

            <div class="space-y-3">
                <?php if ($leccionActual->getId() === 1): ?>
                    <button onclick="agregarComando('Cargar Combustible', 1)" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>1. ⛽ Cargar Combustible</span> <span class="text-xs bg-blue-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>
                    <button onclick="agregarComando('Encender Motores', 2)" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>2. 🔥 Encender Motores</span> <span class="text-xs bg-amber-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>
                    <button onclick="agregarComando('¡Despegar!', 3)" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>3. 🚀 ¡Despegar!</span> <span class="text-xs bg-emerald-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>

                <?php elseif ($leccionActual->getId() === 2): ?>
                    <button onclick="agregarComando('Repetir 3 veces (Avanzar)', 1)" class="w-full bg-purple-600 hover:bg-purple-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>🔁 Repetir 3x [Avanzar Paso]</span> <span class="text-xs bg-purple-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>
                    <button onclick="agregarComando('Recolectar Gema', 2)" class="w-full bg-cyan-600 hover:bg-cyan-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>💎 Recolectar Gema</span> <span class="text-xs bg-cyan-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>
                    <button onclick="agregarComando('Guardar en Mochila', 3)" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>🎒 Guardar en Mochila</span> <span class="text-xs bg-emerald-800 px-2 py-1 rounded">+ Agregar</span>
                    </button>

                <?php elseif ($leccionActual->getId() === 3): ?>
                    <button onclick="agregarComando('SI (Llave == Dorada) ENTONCES Abrir', 1)" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>🔑 SI (Llave == Dorada) -> Abrir</span> <span class="text-xs bg-amber-800 px-2 py-1 rounded">+ Seleccionar</span>
                    </button>
                    <button onclick="agregarComando('SI (Llave == Plateada) ENTONCES Abrir', 2)" class="w-full bg-slate-600 hover:bg-slate-500 text-white font-bold py-3 px-4 rounded-xl shadow transition text-left flex justify-between items-center">
                        <span>🗝️ SI (Llave == Plateada) -> Abrir</span> <span class="text-xs bg-slate-800 px-2 py-1 rounded">+ Seleccionar</span>
                    </button>
                <?php endif; ?>
            </div>

            <!-- Contenedor del Algoritmo -->
            <div class="mt-6 pt-4 border-t border-slate-700">
                <h3 class="text-sm font-semibold text-slate-300 mb-3">Tu Algoritmo (Secuencia):</h3>
                <div id="contenedor-secuencia" class="min-h-[100px] bg-slate-900/80 rounded-xl p-3 border border-slate-700 space-y-2 flex flex-col justify-center items-center text-slate-500 text-sm">
                    No has agregado comandos todavía.
                </div>
            </div>

            <!-- Acciones -->
            <div class="flex gap-3 mt-4">
                <button onclick="ejecutarAlgoritmo()" class="flex-1 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-3 rounded-xl shadow-lg transition">
                    ▶ Ejecutar Código
                </button>
                <button onclick="reiniciar()" class="bg-slate-700 hover:bg-slate-600 text-slate-300 font-medium px-4 rounded-xl transition">
                    🔄 Limpiar
                </button>
            </div>
        </div>

        <!-- PANEL DERECHO: Simulación visual -->
        <div class="bg-slate-800/80 p-6 rounded-2xl border border-slate-700/60 shadow-xl flex flex-col items-center justify-between min-h-[420px]">
            <h2 class="text-lg font-bold text-white w-full text-left flex items-center gap-2">
                <span>🖥️</span> Escenario de Prueba
            </h2>

            <div class="relative w-full flex flex-col items-center justify-end h-64 overflow-hidden border-b-2 border-slate-600 pb-2">
                <?php if ($leccionActual->getId() === 1): ?>
                    <div id="cohete" class="text-7xl transition-transform duration-500">🚀</div>
                    <div id="humo" class="hidden text-2xl animate-bounce">🔥💨</div>
                <?php elseif ($leccionActual->getId() === 2): ?>
                    <div class="flex items-center gap-6 text-5xl">
                        <div id="robot" class="transition-all duration-500">🤖</div>
                        <div id="gemas" class="text-3xl">💎💎💎</div>
                    </div>
                <?php elseif ($leccionActual->getId() === 3): ?>
                    <div id="puerta" class="text-7xl transition-all duration-500">🚪🔒</div>
                <?php endif; ?>
            </div>

            <!-- Consola -->
            <div id="consola" class="w-full bg-slate-950 p-3 rounded-lg border border-slate-800 font-mono text-xs text-emerald-400 h-20 overflow-y-auto">
                > Esperando secuencia de código para <?php echo $leccionActual->getTitulo(); ?>...
            </div>
        </div>

    </main>

    <footer class="text-center text-xs text-slate-500">
        KidsCode Lab &copy; <?php echo date('Y'); ?> - Sistema de Aprendizaje Interactivo
    </footer>

    <!-- Lógica JavaScript -->
    <script>
        let secuencia = [];
        const nivelActual = <?php echo $leccionActual->getId(); ?>;
        const pasosRequeridos = <?php echo $leccionActual->getPasosRequeridos(); ?>;

        function agregarComando(nombre, id) {
            if (secuencia.length >= pasosRequeridos) return;
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
                </div>
            `).join('');
        }

        function reiniciar() {
            secuencia = [];
            renderizarSecuencia();
            const consola = document.getElementById('consola');
            consola.innerHTML = '> Secuencia reiniciada.';

            if (nivelActual === 1) {
                document.getElementById('cohete').classList.remove('rocket-launch');
                document.getElementById('humo').classList.add('hidden');
            } else if (nivelActual === 2) {
                document.getElementById('robot').style.transform = 'translateX(0px)';
                document.getElementById('gemas').innerHTML = '💎💎💎';
            } else if (nivelActual === 3) {
                document.getElementById('puerta').innerHTML = '🚪🔒';
            }
        }

        function ejecutarAlgoritmo() {
            const consola = document.getElementById('consola');

            if (secuencia.length < pasosRequeridos) {
                consola.innerHTML = `<span class="text-amber-400">> ⚠️ Tu algoritmo necesita ${pasosRequeridos} paso(s).</span>`;
                return;
            }

            if (nivelActual === 1) {
                const esCorrecto = secuencia[0].id === 1 && secuencia[1].id === 2 && secuencia[2].id === 3;
                if (esCorrecto) {
                    consola.innerHTML = '> ⛽ Combustible listo...<br>> 🔥 Motores encendidos...<br><span class="text-emerald-400 font-bold">> 🚀 ¡DESPEGUE EXITOSO!</span>';
                    document.getElementById('humo').classList.remove('hidden');
                    setTimeout(() => document.getElementById('cohete').classList.add('rocket-launch'), 500);
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Orden incorrecto. Pista: Combustible -> Motores -> Despegar.</span>';
                }
            } else if (nivelActual === 2) {
                const esCorrecto = secuencia[0].id === 1 && secuencia[1].id === 2 && secuencia[2].id === 3;
                if (esCorrecto) {
                    consola.innerHTML = '> 🤖 Repitiendo avance 3 veces...<br>> 💎 Gemas recolectadas...<br><span class="text-emerald-400 font-bold">> 🎉 ¡MISIÓN DE BUCLE CUMPLIDA!</span>';
                    document.getElementById('robot').style.transform = 'translateX(60px)';
                    setTimeout(() => document.getElementById('gemas').innerHTML = '🎒 (En mochila)', 800);
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Pista: Primero usa el Bucle de repetir avance, luego recolecta y guarda.</span>';
                }
            } else if (nivelActual === 3) {
                const esCorrecto = secuencia[0].id === 1;
                if (esCorrecto) {
                    consola.innerHTML = '> 🔑 Evaluando: ¿Llave es Dorada? -> VERDADERO<br><span class="text-emerald-400 font-bold">> 🔓 ¡LA PUERTA SE HA ABIERTO!</span>';
                    document.getElementById('puerta').innerHTML = '🚪✨🔓';
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> 🔑 Evaluando: ¿Llave es Plateada? -> FALSO<br>> ❌ La puerta permanece cerrada. Selecciona la llave correcta.</span>';
                }
            }
        }
    </script>
</body>
</html>