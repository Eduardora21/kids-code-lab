<?php

// Cargamos la clase que representa cada lección.
require_once __DIR__ . '/classes/Leccion.php';

// Obtenemos todos los niveles desde nuestro archivo de configuración.
// De esta forma evitamos repetir la información en diferentes páginas.
$nivelesConfig = require __DIR__ . '/config/niveles.php';

$lecciones = [];

// Convertimos cada nivel de la configuración en un objeto Leccion.
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

/*
 * Estos datos todavía son temporales.
 * Cuando implementemos usuarios y base de datos,
 * cada jugador tendrá su propio progreso.
 */
$nivelActual = 1;
$xpActual = 0;
$xpSiguienteNivel = 300;
$misionesCompletadas = 0;

// Evitamos una posible división entre cero.
$porcentajeProgreso = $xpSiguienteNivel > 0
    ? ($xpActual / $xpSiguienteNivel) * 100
    : 0;

// El header utiliza esta variable para construir el título de la pestaña.
$tituloPagina = 'Mis aventuras';

// Cargamos el encabezado común de KidsCode Lab.
require __DIR__ . '/includes/header.php';

?>


<main class="max-w-7xl mx-auto px-6 py-10">

    <!-- =====================================================
         BIENVENIDA AL JUGADOR
         ===================================================== -->
<?php

// Mostramos el banner de bienvenida del mundo actual.
require __DIR__ . '/components/hero.php';

?>

    <!-- =====================================================
         PROGRESO DEL JUGADOR
         ===================================================== -->
    <?php

// Mostramos el progreso actual del jugador.
require __DIR__ . '/components/progreso.php';

?>
    

    <!-- =====================================================
         MUNDO 1 - MISIONES
         ===================================================== -->

    <?php

// Mostramos las misiones pertenecientes al mundo actual.
require __DIR__ . '/components/misiones.php';

?>
    


    <!-- =====================================================
         MUNDOS QUE SE DESBLOQUEARÁN MÁS ADELANTE
         ===================================================== -->

   <?php

// Mostramos una vista previa de los mundos que se desbloquearán más adelante.
require __DIR__ . '/components/proximos-mundos.php';

?>

</main>


<?php

// El footer cierra el body y el documento HTML.
require __DIR__ . '/includes/footer.php';

?>