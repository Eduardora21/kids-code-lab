<!--
    Resumen del progreso del jugador.

    Actualmente los datos son provisionales y llegan desde dashboard.php.
    Más adelante se obtendrán desde la cuenta del usuario y la base de datos.
-->
<section
    class="bg-white
           border border-slate-200
           rounded-3xl
           p-6
           shadow-sm
           mb-10"
>

    <div
        class="flex flex-col
               md:flex-row
               md:items-center
               md:justify-between
               gap-5"
    >

        <div>

            <p
                class="text-xs
                       uppercase
                       tracking-widest
                       font-bold
                       text-indigo-600
                       mb-1"
            >
                Tu progreso
            </p>

            <h2
                class="text-xl
                       font-black
                       text-slate-900"
            >
                Explorador de Código
            </h2>

        </div>


        <!-- Estadísticas principales del jugador -->
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
                    🎯 <?= $misionesCompletadas ?> / <?= count($lecciones) ?>
                </p>

            </div>

        </div>

    </div>


    <!-- Barra que representa la experiencia acumulada -->
    <div class="mt-6">

        <div
            class="flex justify-between
                   text-sm font-semibold
                   text-slate-500
                   mb-2"
        >

            <span>
                Nivel <?= $nivelActual ?>
            </span>

            <span>
                <?= $xpActual ?> / <?= $xpSiguienteNivel ?> XP
            </span>

        </div>


        <div
            class="w-full
                   h-3
                   bg-slate-100
                   rounded-full
                   overflow-hidden"
        >

            <div
                class="h-full
                       bg-gradient-to-r
                       from-indigo-500 to-violet-500
                       rounded-full
                       transition-all duration-500"
                style="width: <?= min($porcentajeProgreso, 100) ?>%"
            >
            </div>

        </div>

    </div>

</section>