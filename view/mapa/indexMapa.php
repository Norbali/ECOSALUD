<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <!-- IFRAME que carga el mapa HTML aislado -->
            <div style="position: relative; width: 100%; height: 75vh;">
                <iframe 
                    src="view/mapa/visorCaliMapa.php" 
                    style="width: 100%; height: 100%; border: 1px solid #e0e0e0; border-radius: 8px;"
                    frameborder="0"
                    id="mapaIframe"
                    allow="geolocation">
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- Instrucciones de uso -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-body">
                <h5><i class="fas fa-info-circle"></i> Instrucciones de Uso</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Navegar:</strong> Usa el mouse para desplazarte por el mapa</li>
                            <li><strong>Zoom:</strong> Usa la rueda del mouse o los controles en pantalla</li>
                            <li><strong>Capas:</strong> Activa/desactiva las capas usando los checkboxes</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Insertar Punto:</strong> Haz clic en el ícono de ubicación y luego en el mapa</li>
                            <li><strong>Consultar:</strong> Haz clic en el ícono de información y luego en un punto</li>
                            <li><strong>Vista General:</strong> Usa el mini mapa en la esquina superior derecha</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>