<!--
    Mapa de misiones del mundo actual.

    Las lecciones llegan desde dashboard.php.
    Por ahora el desbloqueo es provisional; más adelante dependerá
    del progreso real guardado para cada jugador.
-->
<section>

    <!-- Información del mundo actual -->
    <div
        class="flex flex-col
               sm:flex-row
               sm:items-end
               sm:justify-between
               gap-3
               mb-6"
    >

        <div>

            <p
                class="text-sm
                       font-bold
                       text-indigo-600
                       uppercase
                       tracking-wider"
            >
                Mundo 1
            </p>

            <h2
                class="text-2xl md:text-3xl
                       font-black
                       text-slate-900"
            >
                🌱 Aventureros del Código
            </h2>

            <p class="text-slate-500 mt-2">
                Completa las misiones y descubre cómo piensa
                un programador.
            </p>

        </div>


        <!-- Nivel de aprendizaje de este mundo -->
        <div
            class="bg-emerald-50
                   text-emerald-700
                   px-4 py-2
                   rounded-xl
                   text-sm font-bold"
        >
            Principiante
        </div>

    </div>


    <!-- Tarjetas de las misiones disponibles -->
    <div
        class="grid
               grid-cols-1
               md:grid-cols-2
               lg:grid-cols-3
               gap-6"
    >

        <?php foreach ($lecciones as $indice => $leccion): ?>

            <?php

            /*
             * Temporalmente solo dejamos disponible la primera misión.
             *
             * Cuando tengamos usuarios y base de datos, comprobaremos
             * aquí cuáles misiones ha completado cada jugador.
             */
            $bloqueado = $indice > 0;

            ?>

            <article
                class="group
                       relative
                       bg-white
                       border border-slate-200
                       rounded-3xl
                       p-6
                       transition
                       duration-300
                       <?= $bloqueado
                           ? 'opacity-70'
                           : 'hover:-translate-y-1 hover:shadow-xl'
                       ?>"
            >

                <!-- Número de la misión -->
                <div
                    class="absolute
                           top-5 right-5
                           text-xs
                           font-black
                           text-slate-400"
                >
                    MISIÓN <?= $leccion->getId() ?>
                </div>


                <!-- Icono representativo -->
                <div
                    class="w-16 h-16
                           rounded-2xl
                           <?= $bloqueado
                               ? 'bg-slate-100'
                               : 'bg-indigo-50'
                           ?>
                           flex items-center
                           justify-center
                           text-4xl
                           mb-5"
                >
                    <?= htmlspecialchars($leccion->getIcono()) ?>
                </div>


                <!-- Nombre de la misión -->
                <h3
                    class="text-xl
                           font-black
                           text-slate-900
                           mb-2"
                >
                    <?= htmlspecialchars($leccion->getTitulo()) ?>
                </h3>


                <!-- Objetivo de la misión -->
                <p
                    class="text-slate-500
                           leading-relaxed
                           min-h-[72px]"
                >
                    <?= htmlspecialchars($leccion->getDescripcion()) ?>
                </p>


                <!-- Datos rápidos de la misión -->
                <div
                    class="flex
                           items-center
                           justify-between
                           mt-6
                           pt-5
                           border-t
                           border-slate-100"
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
                            title="Experiencia que puedes conseguir"
                        >
                            ⭐ <?= $leccion->getXp() ?> XP
                        </span>

                    </div>

                </div>


                <!-- Acción disponible para esta misión -->
                <div class="mt-5">

                    <?php if (!$bloqueado): ?>

                        <a
                            href="index.php?nivel=<?= $leccion->getId() ?>"
                            class="flex
                                   items-center
                                   justify-center
                                   w-full
                                   bg-indigo-600
                                   hover:bg-indigo-700
                                   text-white
                                   font-black
                                   py-3
                                   rounded-xl
                                   transition"
                        >
                            Jugar misión 🚀
                        </a>

                    <?php else: ?>

                        <button
                            type="button"
                            disabled
                            class="flex
                                   items-center
                                   justify-center
                                   w-full
                                   bg-slate-100
                                   text-slate-400
                                   font-bold
                                   py-3
                                   rounded-xl
                                   cursor-not-allowed"
                        >
                            🔒 Completa la misión anterior
                        </button>

                    <?php endif; ?>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</section>