<?php
if(ControlSesionAdmin :: sesion_iniciada()/*&&!ControlSesion :: sesion_iniciada()*/) {
  ?>
  <div id="slide-out" class="row admon fixed sombra" style="background-color: white;color: white;width: 300px;">
    <div class="col-12 row enlaces">
      <div class="col-1"></div>
      <div class="col-10">
        <img class="logo" itemprop="image" alt="logo <?php echo $nombreEmpresa; ?>" src="<?php echo RUTA_IMG; ?>logo/1.png">
        <div>
          <br><br>
          <a href="<?php echo RUTA_PERFIL_ADMIN;?>">Administracion</a>
          <br>
          <a href="<?php echo RUTA_BLOG;?>">Blog</a>
          <br>
          <a href="<?php echo RUTA_GALERIA;?>">Galeria</a>
          <br>
          <a href="<?php echo RUTA_LOGOUT;?>">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <a href="#" data-activates="slide-out" class="button-collapse menu"><span class="material-icons">menu</span></a>
<?php
}else{
  ?>
<div id="slide-out" class="row side-nav"> 
  <div class="col-12 row enlaces">
  	<div class="col-2"></div>
    <div class="col-10" align="left">
      <img class="logo" itemprop="image" alt="logo <?php echo $nombreEmpresa; ?>" src="<?php echo RUTA_IMG; ?>logo/3.png">
      <div>
        <br><br>
        <a href="<?php echo SERVIDOR;?>">Inicio</a>
        <br>
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Servicios</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="<?php echo RUTA_PACKS;?>">Packs</a></li>
                <li><a href="<?php echo RUTA_ONLINE;?>">Online</a></li>
                <li><a href="<?php echo RUTA_OFFLINE;?>">Offline</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <a href="<?php echo RUTA_GALERIA;?>">Galeria</a>
        <br>
        <a href="<?php echo RUTA_BLOG;?>">Blog</a>
        <br>
        <a href="<?php echo SERVIDOR;?>#contacto">Contacto</a>
        <br>
        <a href="<?php echo RUTA_ABOUT;?>">Acerca de</a>
        <br><br>
        <p style="color: white;font-size: 1.2em;letter-spacing: .05em;">Sígueme</p>
        <div class="col-12 row redes">
          <a class="col-2" href="<?php echo $githubEmpresa;?>" target="_blank"><i class="fa-brands fa-github"></i></a>
          <a class="col-2" href="<?php echo $instagramEmpresa;?>" target="_blank"><i class="fab fa-instagram"></i></a>
          <a class="col-2" href="<?php echo $twitterEmpresa;?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#" data-activates="slide-out" class="button-collapse menu"><span class="material-icons">menu</span></a>
<?php
}


        