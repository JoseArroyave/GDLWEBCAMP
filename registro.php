<?php
include_once 'includes/templates/header.php';
?>
<section class="seccion contenedor" id="reservas">

  <form class="registro" action="validar_registro.php" id="registro" method='post'>
    <div id="datos_usuario" class="registro caja clearfix">
      <h2>Registro de usuarios</h2>
      <div class="campo">
        <label for="nombre">Nombre<span>*</span></label>
        <input type="text" name="nombre" placeholder="Tu nombre" id="nombre" required>
      </div>
      <div class="campo">
        <label for="apellido">Apellido<span>*</span></label>
        <input type="text" name="apellido" placeholder="Tu apellido" id="apellido" required>
      </div>
      <div class="campo">
        <label for="email">Email<span>*</span></label>
        <input type="email" name="email" placeholder="Tu email" id="email" required>
      </div>
      <div id="error"></div>
    </div>
    <!--#datos_usuario-->
    <div class="paquetes caja" id="paquetes">
      <h2>Elige el número de boletos</h2>
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por un día (viernes)</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_dia">Boletos deseados:</label>
              <input type="number" min="0" size="3" name="boletos[un_dia][cantidad]" placeholder="0" id="pase_dia">
              <input type="hidden" value="30" name="boletos[un_dia][precio]">
            </div>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_completo">Boletos deseados:</label>
              <input type="number" min="0" size="3" name="boletos[completo][cantidad]" placeholder="0" id="pase_completo">
              <input type="hidden" value="50" name="boletos[completo][precio]">
            </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días (viernes y sábado)</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_2_dias">Boletos deseados:</label>
              <input type="number" min="0" size="3" name="boletos[2dias][cantidad]" placeholder="0" id="pase_dosdias">
              <input type="hidden" value="45" name="boletos[2dias][precio]">
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div id="eventos" class="eventos clearfix">
      <div class="caja">
        <h2>Elige tus talleres</h2>
        <?php
        try {
          require_once('includes/functions/bd_conexion.php');
          $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
          $sql .= " FROM eventos ";
          $sql .= " JOIN categoria_evento ";
          $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
          $sql .= " JOIN invitados ";
          $sql .= " ON eventos.id_inv_evento = invitados.id_invitado ";
          $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";

          $resultado = $conn->query($sql);
        } catch (Exception $e) {
          echo $e->getMessage();
        }

        $eventos_dias = array();
        while ($eventos = $resultado->fetch_assoc()) {
          $fecha = $eventos['fecha_evento'];
          setlocale(LC_ALL, 'es_ES');
          $dia_semana = strftime("%A", strtotime($fecha));

          $categoria = $eventos['cat_evento'];
          $dia = array(
            'nombre_evento' => $eventos['nombre_evento'],
            'hora_evento' => $eventos['hora_evento'],
            'id_evento' => $eventos['id_evento'],
            'nombre_invitado' => $eventos['nombre_invitado'],
            'apellido_invitado' => $eventos['apellido_invitado'],
            'clave' => $eventos['clave']
          );
          $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
        }
        ?>

        <?php
        foreach ($eventos_dias as $dia => $eventos) { ?>
          <div id="<?php echo $dia; ?>" class="contenido-dia clearfix">
            <h4><?php echo $dia; ?></h4>
            <?php
            foreach ($eventos['eventos'] as $tipo => $evento_dia) { ?>
              <div>
                <p><?php echo $tipo ?></p>
                <?php foreach ($evento_dia as $evento) { ?>
                  <label>
                    <input type="checkbox" name="registro[]" id="<?php echo $evento['id_evento'] ?>" value="<?php echo $evento['clave'] ?>">
                    <time><?php echo $evento['hora_evento'] ?></time> <?php echo $evento['nombre_evento'] ?>
                    <br>
                    <span class="autor">
                      <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'] ?>
                    </span>
                  </label>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        <!--#contenido-dia-->
      </div>
      <!--.caja-->
    </div>
    <!--#eventos-->
    <div id="resumen" class="resumen">
      <div class="caja clearfix">
        <h2>Pago y extras</h2>
        <div class="extras">
          <div id="orden">
            <label for="camisa_evento">Camisa del evento $10<small> (promoción 7% dto.)</small></label> <br>
            <input type="number" min='0' name="pedido_extra[camisas][cantidad]" id='camisa_evento' size='3' placeholder="0">
            <input type="hidden" value='10' name="pedido_extra[camisas][precio]">
          </div>
          <!--orden-->
          <div id="orden">
            <br>
            <label for="etiquetas">Paquete de 10 etiquetas $2<small> (HTML5, CSS3, JavaScript, Chrome, etc.)</small></label><br>
            <input type="number" min='0' name="pedido_extra[etiquetas][cantidad]" id='etiquetas' size='3' placeholder="0">
            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
          </div>
          <!--orden-->
          <div class="orden">
            <br>
            <label for="regalo">Seleccione un regalo<span>*</span></label> <br>
            <select id="regalo" name='regalo' required>
              <option value="">Seleccione un regalo</option>
              <option value="Etiquetas">Etiquetas</option>
              <option value="Pulseras">Pulseras</option>
              <option value="Plumas">Plumas</option>
            </select>
          </div>
          <!--orden-->
          <input type="button" id='calcular' class="button" value='Calcular'>
        </div>
        <!--.extras-->
        <div class="total">
          <p>Resumen:</p>
          <div id="lista-productos"></div>
          <p>Total:</p>
          <div id="suma-total"></div>
          <input type="hidden" name="total_pedido" id="total_pedido">
          <input type="submit" id="btnRegistro" class="button" value="pagar" name='form'>
        </div>
        <!--#total-->
      </div>
      <!--#caja-->
    </div>
    <!--#resumen-->
  </form>
</section>
<?php
include_once 'includes/templates/footer.php';
?>