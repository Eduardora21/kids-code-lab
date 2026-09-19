<?php

/*
 * Encabezado principal de KidsCode Lab.
 *
 * Este archivo se reutiliza en las diferentes páginas de la plataforma
 * para mantener el mismo diseño y evitar repetir código.
 */

// Si la página no envía un título, utilizamos uno por defecto.
$tituloPagina = $tituloPagina ?? 'KidsCode Lab';

// Mientras no tengamos usuarios registrados,
// mostramos el nivel 1 como valor provisional.
$nivelActual = $nivelActual ?? 1;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- Título que aparece en la pestaña del navegador -->
    <title>
        <?= htmlspecialchars($tituloPagina) ?> | KidsCode Lab
    </title>

    <!-- Logo utilizado como icono de la pestaña -->
    <link
        rel="icon"
        type="image/png"
        href="public/img/logo2.png"
    >

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Estilos personalizados de KidsCode Lab -->
    <link
        rel="stylesheet"
        href="public/css/styles.css"
    >

</head>


<body class="min-h-screen bg-slate-50 text-slate-800">


    <!-- =====================================================
         ENCABEZADO PRINCIPAL
         ===================================================== -->

    <header class="bg-white border-b border-slate-200">

        <!--
            Utilizamos una altura fija para evitar que el tamaño
            del logo haga crecer demasiado el encabezado.
        -->
        <div
            class="max-w-7xl mx-auto px-6
                   h-24
                   flex items-center justify-between"
        >

            <!-- Logo de KidsCode Lab -->
            <a
                href="dashboard.php"
                class="flex items-center"
                aria-label="Ir al inicio de KidsCode Lab"
            >

                <img
                    src="public/img/logo.png"
                    alt="Logo de KidsCode Lab"
                    class="h-24 w-auto object-contain"
                >

            </a>


            <!-- =================================================
                 INFORMACIÓN DEL JUGADOR
                 ================================================= -->

            <div class="flex items-center gap-3">

                <!--
                    Esta información es provisional.
                    Más adelante vendrá del usuario que haya
                    iniciado sesión en la plataforma.
                -->
                <div class="hidden sm:block text-right">

                    <p class="text-sm font-bold text-slate-800">
                        Explorador
                    </p>

                    <p class="text-xs text-slate-500">
                        Nivel <?= $nivelActual ?>
                    </p>

                </div>


                <!-- Avatar provisional del jugador -->
                <div
                    class="w-11 h-11
                           rounded-full
                           bg-amber-100
                           flex items-center justify-center
                           text-2xl
                           border-2 border-amber-300"
                    title="Perfil del jugador"
                >
                    🧑‍🚀
                </div>

            </div>

        </div>

    </header>