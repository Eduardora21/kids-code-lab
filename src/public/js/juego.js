/*
 * Lógica principal de las misiones de KidsCode Lab.
 *
 * Este archivo controla la construcción de la secuencia,
 * la validación de cada misión y las animaciones del escenario.
 */

// Secuencia de comandos construida por el jugador.
let secuencia = [];


/*
 * Agrega un nuevo comando a la secuencia.
 * No permite superar la cantidad de pasos de la misión.
 */
function agregarComando(nombre, id) {

    if (secuencia.length >= pasosRequeridos) {
        return;
    }

    secuencia.push({
        nombre,
        id
    });

    renderizarSecuencia();
}


/*
 * Actualiza visualmente los comandos seleccionados
 * y el contador de pasos.
 */
function renderizarSecuencia() {

    const contenedor =
        document.getElementById('contenedor-secuencia');

    const contador =
        document.getElementById('contador-pasos');

    contador.innerText =
        `${secuencia.length} / ${pasosRequeridos} pasos`;


    if (secuencia.length === 0) {

        contenedor.innerHTML = `
            <span class="text-slate-500 text-xs">
                Haz clic en los bloques arriba para construir tu código.
            </span>
        `;

        return;
    }


    contenedor.innerHTML = secuencia
        .map((comando, indice) => `
            <div
                class="w-full
                       bg-slate-800
                       text-yellow-300
                       px-2.5 py-1.5
                       rounded-lg
                       text-xs
                       font-mono
                       flex
                       justify-between
                       items-center
                       border
                       border-slate-700"
            >
                <span>
                    ${indice + 1}. ${comando.nombre}
                </span>
            </div>
        `)
        .join('');
}


/*
 * Limpia la secuencia y devuelve el escenario
 * de la misión a su estado inicial.
 */
function reiniciar() {

    secuencia = [];

    renderizarSecuencia();

    const consola =
        document.getElementById('consola');

    consola.innerHTML =
        '> Secuencia reiniciada.';


    // Reiniciar el escenario del cohete.
    if (nivelActual === 1) {

        document.getElementById('cohete').style.transform =
            'translateY(0px)';

        document
            .getElementById('humo')
            .classList
            .add('hidden');
    }


    // Reiniciar el escenario del robot.
    else if (nivelActual === 2) {

        document.getElementById('robot').style.transform =
            'translateX(0px)';

        document.getElementById('gemas').innerHTML =
            '💎💎💎';
    }


    // Reiniciar el escenario de la puerta.
    else if (nivelActual === 3) {

        document.getElementById('puerta').innerHTML =
            '🚪🔒';
    }
}

/*
 * Ejecuta el resultado visual de una misión completada.
 *
 * La validación es común para todos los niveles,
 * pero cada misión puede tener su propia animación
 * y mensaje de éxito.
 */
function mostrarMisionCompletada(consola) {

    // Resultado del nivel 1: Cohete Espacial.
    if (nivelActual === 1) {

        consola.innerHTML = `
            > ⛽ Combustible cargado...<br>
            > 👨‍🚀 Cinturón listo...<br>
            > 🔥 Motores encendidos...<br>

            <span class="text-emerald-400 font-bold">
                > 🚀 ¡DESPEGUE EXITOSO!
                ¡NIVEL COMPLETADO!
            </span>
        `;

        document
            .getElementById('humo')
            .classList
            .remove('hidden');

        setTimeout(() => {

            document
                .getElementById('cohete')
                .style
                .transform = 'translateY(-120px)';

        }, 400);
    }


    // Resultado del nivel 2: Robot Explorador.
    else if (nivelActual === 2) {

        consola.innerHTML = `
            > 🔁 Ejecutando Bucle (3 repeticiones)...<br>
            > 💎 Recolectando gemas...<br>

            <span class="text-emerald-400 font-bold">
                > 🎒 ¡GEMAS GUARDADAS!
                ¡BUCLE EXITOSO!
            </span>
        `;

        document
            .getElementById('robot')
            .style
            .transform = 'translateX(50px)';

        setTimeout(() => {

            document
                .getElementById('gemas')
                .innerHTML = '🎒 (En mochila)';

        }, 600);
    }


    // Resultado del nivel 3: Puerta Secreta.
    else if (nivelActual === 3) {

        consola.innerHTML = `
            > 🔑 Evaluando:
            ¿Llave es Dorada? -> VERDADERO<br>

            <span class="text-emerald-400 font-bold">
                > 🔓 ¡LA PUERTA SE HA ABIERTO!
                ¡RETO SUPERADO!
            </span>
        `;

        document
            .getElementById('puerta')
            .innerHTML = '🚪✨🔓';
    }
}

/*
 * Ejecuta y valida la secuencia construida por el jugador.
 *
 * La solución correcta ya no está escrita directamente
 * dentro de cada nivel. Ahora llega desde PHP utilizando
 * la configuración guardada en soluciones.php.
 */
function ejecutarAlgoritmo() {

    const consola =
        document.getElementById('consola');


    /*
     * Antes de validar la solución comprobamos que el jugador
     * haya agregado todos los pasos necesarios.
     */
    if (secuencia.length < pasosRequeridos) {

        consola.innerHTML = `
            <span class="text-amber-400">
                > ⚠️ Tu algoritmo requiere exactamente
                ${pasosRequeridos} pasos para probarse.
            </span>
        `;

        return;
    }


    /*
     * Extraemos únicamente los identificadores de los bloques
     * seleccionados por el jugador.
     */
    const ids =
        secuencia.map(comando => comando.id);


    /*
     * Comparamos automáticamente la secuencia del jugador
     * con la solución recibida desde PHP.
     *
     * Si todos los bloques están en la posición correcta,
     * la misión se considera resuelta.
     */
    const esCorrecto =
        ids.length === solucionCorrecta.length &&
        ids.every(
            (id, indice) =>
                id === solucionCorrecta[indice]
        );


    /*
     * Comprobamos si el jugador utilizó alguno
     * de los bloques distractores de la misión.
     */
    const tieneDistractor =
        ids.some(
            id => distractores.includes(id)
        );


    // =========================================================
    // NIVEL 1: COHETE ESPACIAL
    // =========================================================

    if (nivelActual === 1) {

        /*
         * Ya no necesitamos comprobar dist1 y dist2
         * manualmente porque soluciones.php nos indica
         * cuáles son los distractores.
         */
        if (tieneDistractor) {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > ❌ Error: ¡Esa acción no ayuda a despegar
                    el cohete! Evita la pizza o la siesta.
                </span>
            `;

            return;
        }


        /*
         * esCorrecto ya fue calculado de forma genérica.
         * Aquí solamente mostramos el resultado específico
         * de esta misión.
         */
        if (esCorrecto) {

            consola.innerHTML = `
                > ⛽ Combustible cargado...<br>
                > 👨‍🚀 Cinturón listo...<br>
                > 🔥 Motores encendidos...<br>

                <span class="text-emerald-400 font-bold">
                    > 🚀 ¡DESPEGUE EXITOSO!
                    ¡NIVEL COMPLETADO!
                </span>
            `;


            document
                .getElementById('humo')
                .classList
                .remove('hidden');


            setTimeout(() => {

                document
                    .getElementById('cohete')
                    .style
                    .transform = 'translateY(-120px)';

            }, 400);

        } else {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > ❌ Orden incorrecto.<br>
                    Pista: Combustible ➡️ Cinturón ➡️
                    Motores ➡️ Despegue.
                </span>
            `;
        }
    }


    // =========================================================
    // NIVEL 2: ROBOT EXPLORADOR
    // =========================================================

    else if (nivelActual === 2) {

        /*
         * Los distractores del robot también llegan
         * desde soluciones.php.
         */
        if (tieneDistractor) {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > ❌ Error: El robot se distrajo.
                    Usa solamente los bloques del bucle
                    y la mochila.
                </span>
            `;

            return;
        }


        if (esCorrecto) {

            consola.innerHTML = `
                > 🔁 Ejecutando Bucle (3 repeticiones)...<br>
                > 💎 Recolectando gemas...<br>

                <span class="text-emerald-400 font-bold">
                    > 🎒 ¡GEMAS GUARDADAS!
                    ¡BUCLE EXITOSO!
                </span>
            `;


            document
                .getElementById('robot')
                .style
                .transform = 'translateX(50px)';


            setTimeout(() => {

                document
                    .getElementById('gemas')
                    .innerHTML = '🎒 (En mochila)';

            }, 600);

        } else {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > ❌ Orden incorrecto.<br>
                    Pista: Bucle ➡️ Avanzar ➡️
                    Recolectar ➡️ Mochila.
                </span>
            `;
        }
    }


    // =========================================================
    // NIVEL 3: PUERTA SECRETA
    // =========================================================

    else if (nivelActual === 3) {

        /*
         * Igual que en los niveles anteriores,
         * utilizamos la lista general de distractores.
         */
        if (tieneDistractor) {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > 💥 ¡Cuidado! Esa llave activó un peligro.
                    Selecciona la llave correcta.
                </span>
            `;

            return;
        }


        if (esCorrecto) {

            consola.innerHTML = `
                > 🔑 Evaluando:
                ¿Llave es Dorada? -> VERDADERO<br>

                <span class="text-emerald-400 font-bold">
                    > 🔓 ¡LA PUERTA SE HA ABIERTO!
                    ¡RETO SUPERADO!
                </span>
            `;


            document
                .getElementById('puerta')
                .innerHTML = '🚪✨🔓';

        } else {

            consola.innerHTML = `
                <span class="text-rose-400">
                    > 🔒 Evaluando condición... FALSO.<br>
                    La puerta no se abrió. Asegúrate de
                    evaluar la llave dorada y abrir.
                </span>
            `;
        }
    }
}