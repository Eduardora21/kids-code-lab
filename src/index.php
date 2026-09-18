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
        'Organizar los 4 pasos correctos de despegue sin caer en las distracciones.',
        4
    ),
    2 => new Leccion(
        2,
        'El Robot Explorador',
        'Módulo 2: Bucles y Repeticiones',
        '🤖',
        'Sirve para entender cómo repetir acciones automáticamente (bucles).',
        'Crear la estructura del bucle para recolectar las 3 gemas eficientemente.',
        4
    ),
    3 => new Leccion(
        3,
        'La Puerta Secreta',
        'Módulo 3: Condicionales (Si / Sino)',
        '🔑',
        'Sirve para que el programa tome decisiones según se cumpla una condición (IF/ELSE).',
        'Evaluar cuál es la llave correcta para abrir la puerta del castillo.',
        2
    )
];

// Validar nivel activo
$idNivel = isset($_GET['nivel']) ? (int)$_GET['nivel'] : 1;
if (!array_key_exists($idNivel,$catalogoNiveles)) {
    $idNivel = 1; }$leccionActual = $catalogoNiveles[$idNivel];

// Definición de los 6 bloques por nivel
$bloquesPorNivel = [
    1 => [
        ['id' => 'paso1', 'texto' => '1. ⛽ Cargar Combustible', 'tipo' => 'correcto', 'color' => 'bg-blue-600 hover:bg-blue-500'],
        ['id' => 'paso2', 'texto' => '2. 👨‍🚀 Abrochar Cinturón', 'tipo' => 'correcto', 'color' => 'bg-cyan-600 hover:bg-cyan-500'],
        ['id' => 'paso3', 'texto' => '3. 🔥 Encender Motores', 'tipo' => 'correcto', 'color' => 'bg-amber-600 hover:bg-amber-500'],
        ['id' => 'paso4', 'texto' => '4. 🚀 ¡Iniciar Despegue!', 'tipo' => 'correcto', 'color' => 'bg-emerald-600 hover:bg-emerald-500'],
        ['id' => 'dist1', 'texto' => '🍕 Comer una Pizza', 'tipo' => 'distractor', 'color' => 'bg-rose-700 hover:bg-rose-600'],
        ['id' => 'dist2', 'texto' => '😴 Tomar una Siesta', 'tipo' => 'distractor', 'color' => 'bg-indigo-700 hover:bg-indigo-600'],
    ],
    2 => [
        ['id' => 'bucle_inicio', 'texto' => '1. 🔁 REPETIR 3 VECES:', 'tipo' => 'correcto', 'color' => 'bg-purple-600 hover:bg-purple-500'],
        ['id' => 'bucle_avanzar', 'texto' => '2. ➡️   └─ Avanzar 1 Paso', 'tipo' => 'correcto', 'color' => 'bg-blue-600 hover:bg-blue-500'],
        ['id' => 'bucle_gema',    'texto' => '3. 💎   └─ Recolectar Gema', 'tipo' => 'correcto', 'color' => 'bg-cyan-600 hover:bg-cyan-500'],
        ['id' => 'bucle_mochila', 'texto' => '4. 🎒 Guardar en Mochila', 'tipo' => 'correcto', 'color' => 'bg-emerald-600 hover:bg-emerald-500'],
        ['id' => 'dist_robot1',   'texto' => '🛑 Apagar Robot', 'tipo' => 'distractor', 'color' => 'bg-slate-600 hover:bg-slate-500'],
        ['id' => 'dist_robot2',   'texto' => '💃 Bailar Festejo', 'tipo' => 'distractor', 'color' => 'bg-pink-600 hover:bg-pink-500'],
    ],
    3 => [
        ['id' => 'if_dorada',  'texto' => '🔑 SI (Llave == Dorada)', 'tipo' => 'correcto', 'color' => 'bg-amber-600 hover:bg-amber-500'],
        ['id' => 'then_abrir', 'texto' => '🔓 ENTONCES -> Abrir Puerta', 'tipo' => 'correcto', 'color' => 'bg-emerald-600 hover:bg-emerald-500'],
        ['id' => 'if_plateada','texto' => '🗝️ SI (Llave == Plateada)', 'tipo' => 'incorrecto', 'color' => 'bg-slate-600 hover:bg-slate-500'],
        ['id' => 'then_cerrar','texto' => '🔒 ENTONCES -> Quedar Cerrado', 'tipo' => 'incorrecto', 'color' => 'bg-zinc-600 hover:bg-zinc-500'],
        ['id' => 'if_dragon',  'texto' => '🐉 SI (Llave == Juguete) -> Despertar Dragón', 'tipo' => 'distractor', 'color' => 'bg-rose-700 hover:bg-rose-600'],
        ['id' => 'if_trampa',  'texto' => '💣 SI (Llave == Oxidada) -> Activar Trampa', 'tipo' => 'distractor', 'color' => 'bg-purple-700 hover:bg-purple-600'],
    ]
];

// Obtener bloques del nivel actual y desordenarlos aleatoriamente con shuffle()
$bloquesActuales = $bloquesPorNivel[$idNivel];
shuffle($bloquesActuales);
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
    
   <!-- Encabezado Estilo Arcade / Videojuego -->
    <header class="max-w-4xl mx-auto w-full mb-2">
        <div class="bg-gradient-to-r from-indigo-900 via-slate-800 to-purple-900 rounded-2xl p-4 border-2 border-indigo-500/40 shadow-[0_0_20px_rgba(99,102,241,0.2)] flex flex-wrap justify-between items-center gap-4 relative overflow-hidden">
            
            <!-- Adorno de fondo brillante -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-yellow-400/10 rounded-full blur-2xl pointer-events-none"></div>

            <!-- LADO IZQUIERDO: Botón Volver + Título de la Lección -->
            <div class="flex items-center gap-3 z-10">
                <a href="dashboard.php" class="group bg-slate-900/90 hover:bg-yellow-400 text-slate-300 hover:text-slate-950 font-black px-3 py-2 rounded-xl border border-slate-700 hover:border-yellow-300 transition-all duration-200 flex items-center gap-2 text-xs shadow-md">
                    <span class="group-hover:-translate-x-1 transition-transform">⬅️</span>
                    <span>MENÚ</span>
                </a>

                <div class="flex items-center gap-2.5 bg-slate-900/60 px-3.5 py-2 rounded-xl border border-slate-700/80">
                    <span class="text-3xl animate-bounce"><?php echo $leccionActual->getIcono(); ?></span>
                    <div>
                        <span class="text-[10px] font-black tracking-widest text-yellow-400 uppercase block leading-none mb-1">MISIÓN ACTUAL</span>
                        <h1 class="text-lg font-black text-white leading-none tracking-wide drop-shadow-md">
                            <?php echo $leccionActual->getTitulo(); ?>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- LADO DERECHO: Tag del Módulo e Indicadores -->
            <div class="flex items-center gap-2 z-10">
                <div class="bg-slate-900/80 border border-indigo-500/50 px-3 py-1.5 rounded-xl flex items-center gap-2 shadow-inner">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs font-bold text-indigo-200"><?php echo $leccionActual->getModulo(); ?></span>
                </div>
                
                <div class="hidden sm:flex bg-yellow-400/10 border border-yellow-400/30 text-yellow-300 font-extrabold text-xs px-3 py-1.5 rounded-xl items-center gap-1">
                    <span>⭐</span>
                    <span>NIVEL <?php echo $leccionActual->getId(); ?></span>
                </div>
            </div>

        </div>
    </header>

    <!-- Área principal del juego -->
    <main class="max-w-4xl mx-auto w-full my-6 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
        
        <!-- PANEL IZQUIERDO: 6 Bloques Desordenados -->
        <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700/60 shadow-xl">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-base font-bold text-white flex items-center gap-2">
                    <span>🧩</span> Bloques Disponibles
                </h2>
                <span class="text-xs text-yellow-400/80 bg-slate-900 px-2 py-1 rounded border border-slate-700">🔀 Desordenados</span>
            </div>
            <p class="text-slate-400 text-xs mb-3">Selecciona los bloques en el orden correcto para resolver el reto:</p>

            <!-- Grid de Bloques -->
            <div class="space-y-2">
                <?php foreach ($bloquesActuales as$bloque): ?>
                    <button onclick="agregarComando('<?php echo addslashes($bloque['texto']); ?>', '<?php echo$bloque['id']; ?>')" 
                            class="w-full <?php echo $bloque['color']; ?> text-white font-bold py-2.5 px-3 rounded-xl shadow transition text-left text-xs flex justify-between items-center">
                        <span><?php echo $bloque['texto']; ?></span>
                        <span class="text-[10px] bg-black/30 px-2 py-0.5 rounded">+ Agregar</span>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Contenedor del Algoritmo -->
            <div class="mt-5 pt-3 border-t border-slate-700">
                <h3 class="text-xs font-semibold text-slate-300 mb-2 flex justify-between items-center">
                    <span>Tu Secuencia de Código:</span>
                    <span id="contador-pasos" class="text-yellow-400 text-[11px]">0 / <?php echo $leccionActual->getPasosRequeridos(); ?> pasos</span>
                </h3>
                <div id="contenedor-secuencia" class="min-h-[90px] bg-slate-900/80 rounded-xl p-2.5 border border-slate-700 space-y-1.5 flex flex-col justify-center items-center text-slate-500 text-xs">
                    Haz clic en los bloques arriba para construir tu código.
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="flex gap-2 mt-4">
                <button onclick="ejecutarAlgoritmo()" class="flex-1 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-extrabold py-2.5 rounded-xl shadow-lg transition text-sm">
                    ▶ Ejecutar Código
                </button>
                <button onclick="reiniciar()" class="bg-slate-700 hover:bg-slate-600 text-slate-300 font-medium px-3 rounded-xl transition text-xs">
                    🔄 Limpiar
                </button>
            </div>
        </div>

        <!-- PANEL DERECHO: Escenario Visual y Consola -->
        <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700/60 shadow-xl flex flex-col items-center justify-between min-h-[420px]">
            <h2 class="text-base font-bold text-white w-full text-left flex items-center gap-2">
                <span>🖥️</span> Escenario
            </h2>

            <div class="relative w-full flex flex-col items-center justify-end h-56 overflow-hidden border-b-2 border-slate-600 pb-2">
                <?php if ($leccionActual->getId() === 1): ?>
                    <div id="cohete" class="text-7xl transition-transform duration-500">🚀</div>
                    <div id="humo" class="hidden text-2xl animate-bounce">🔥💨</div>
                <?php elseif ($leccionActual->getId() === 2): ?>
                    <div class="flex items-center gap-6 text-5xl">
                        <div id="robot" class="transition-all duration-500">🤖</div>
                        <div id="gemas" class="text-2xl">💎💎💎</div>
                    </div>
                <?php elseif ($leccionActual->getId() === 3): ?>
                    <div id="puerta" class="text-7xl transition-all duration-500">🚪🔒</div>
                <?php endif; ?>
            </div>

            <!-- Consola de Resultados -->
            <div id="consola" class="w-full bg-slate-950 p-3 rounded-lg border border-slate-800 font-mono text-xs text-emerald-400 h-24 overflow-y-auto leading-relaxed mt-3">
                > Esperando código para <?php echo $leccionActual->getTitulo(); ?>...
            </div>
        </div>

    </main>

    <footer class="text-center text-xs text-slate-500">
        KidsCode Lab &copy; <?php echo date('Y'); ?> - Aprendizaje de Lógica de Programación
    </footer>

    <!-- Lógica de Simulación en JavaScript -->
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
            document.getElementById('contador-pasos').innerText = `${secuencia.length} / ${pasosRequeridos} pasos`;

            if (secuencia.length === 0) {
                contenedor.innerHTML = '<span class="text-slate-500 text-xs">Haz clic en los bloques arriba para construir tu código.</span>';
                return;
            }

            contenedor.innerHTML = secuencia.map((cmd, idx) => `
                <div class="w-full bg-slate-800 text-yellow-300 px-2.5 py-1.5 rounded-lg text-xs font-mono flex justify-between items-center border border-slate-700">
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
                document.getElementById('cohete').style.transform = 'translateY(0px)';
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
                consola.innerHTML = `<span class="text-amber-400">> ⚠️ Tu algoritmo requiere exactamente ${pasosRequeridos} pasos para probarse.</span>`;
                return;
            }

            const ids = secuencia.map(s => s.id);

            // VERIFICACIÓN NIVEL 1
            if (nivelActual === 1) {
                if (ids.includes('dist1') || ids.includes('dist2')) {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Error: ¡Esa acción no ayuda a despegar el cohete! Evita la pizza/siesta.</span>';
                    return;
                }
                const esCorrecto = ids[0] === 'paso1' && ids[1] === 'paso2' && ids[2] === 'paso3' && ids[3] === 'paso4';
                if (esCorrecto) {
                    consola.innerHTML = '> ⛽ Combustible cargado...<br>> 👨‍🚀 Cinturón listo...<br>> 🔥 Motores encendidos...<br><span class="text-emerald-400 font-bold">> 🚀 ¡DESPEGUE EXITOSO! ¡NIVEL COMPLETADO!</span>';
                    document.getElementById('humo').classList.remove('hidden');
                    setTimeout(() => document.getElementById('cohete').style.transform = 'translateY(-120px)', 400);
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Orden incorrecto.<br>Pista: Combustible ➡️ Cinturón ➡️ Motores ➡️ Despegue.</span>';
                }
            } 
            // VERIFICACIÓN NIVEL 2
            else if (nivelActual === 2) {
                if (ids.includes('dist_robot1') || ids.includes('dist_robot2')) {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Error: El robot se distrajo. Usa solo los bloques del bucle y mochila.</span>';
                    return;
                }
                const esCorrecto = ids[0] === 'bucle_inicio' && ids[1] === 'bucle_avanzar' && ids[2] === 'bucle_gema' && ids[3] === 'bucle_mochila';
                if (esCorrecto) {
                    consola.innerHTML = '> 🔁 Ejecutando Bucle (3 repeticiones)...<br>> 💎 Recolectando gemas...<br><span class="text-emerald-400 font-bold">> 🎒 ¡GEMAS GUARDADAS! ¡BUCLE EXITOSO!</span>';
                    document.getElementById('robot').style.transform = 'translateX(50px)';
                    setTimeout(() => document.getElementById('gemas').innerHTML = '🎒 (En mochila)', 600);
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> ❌ Orden incorrecto.<br>Pista: Bucle ➡️ Avanzar ➡️ Recolectar ➡️ Mochila.</span>';
                }
            } 
            // VERIFICACIÓN NIVEL 3
            else if (nivelActual === 3) {
                if (ids.includes('if_dragon') || ids.includes('if_trampa')) {
                    consola.innerHTML = '<span class="text-rose-400">> 💥 ¡Cuidado! Esa llave activó un peligro. Selecciona la llave correcta.</span>';
                    return;
                }
                const esCorrecto = ids[0] === 'if_dorada' && ids[1] === 'then_abrir';
                if (esCorrecto) {
                    consola.innerHTML = '> 🔑 Evaluando: ¿Llave es Dorada? -> VERDADERO<br><span class="text-emerald-400 font-bold">> 🔓 ¡LA PUERTA SE HA ABIERTO! ¡RETO SUPERADO!</span>';
                    document.getElementById('puerta').innerHTML = '🚪✨🔓';
                } else {
                    consola.innerHTML = '<span class="text-rose-400">> 🔒 Evaluando condición... FALSO.<br>La puerta no se abrió. Asegúrate de evaluar la llave dorada y abrir.</span>';
                }
            }
        }
    </script>
</body>
</html>