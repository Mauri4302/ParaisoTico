<?php
// Iniciar el buffer de salida
ob_start();
?>
<section class="page-section" id="reservacion">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Reservación</h2>
        <div class="divider-custom my-4">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Formulario de reservación -->
        <form action="index.php?route=reservas&action=store" method="POST">
            <!-- Campo para seleccionar la actividad -->
            <div class="form-floating mb-3">
                <select class="form-control" id="id_actividad" name="id_actividad" required>
                    <option value="">Seleccione una actividad</option>
                    <?php foreach ($actividades as $actividad): ?>
                        <option value="<?php echo $actividad['id_actividad']; ?>">
                            <?php echo $actividad['nombre']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="id_actividad">Actividad</label>
            </div>

            <!-- Campo para seleccionar la oferta (opcional) -->
            <div class="form-floating mb-3">
                <select class="form-control" id="id_oferta" name="id_oferta">
                    <option value="">Seleccione una oferta (opcional)</option>
                    <?php foreach ($ofertas as $oferta): ?>
                        <option value="<?php echo $oferta['id_oferta']; ?>">
                            <?php echo $oferta['nombre']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="id_oferta">Oferta</label>
            </div>

            <!-- Campo para la fecha de reserva -->
            <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                <label for="fecha_reserva">Fecha de reserva</label>
            </div>

            <!-- Campo para la fecha de la actividad -->
            <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" id="fecha_actividad" name="fecha_actividad" required>
                <label for="fecha_actividad">Fecha de la actividad</label>
            </div>

            <!-- Botón para enviar el formulario -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
        </form>
    </div>
</section>
<?php
// Obtener el contenido del buffer y limpiarlo
$content = ob_get_clean();

// Incluir el layout
include 'app/Views/Layout/layout.php';
?>