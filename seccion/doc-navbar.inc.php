<?php
if(ControlSesionAdmin :: sesion_iniciada()/*&&!ControlSesion :: sesion_iniciada()*/) {
  ?>
  <div id="slide-out" class="row admon fixed sombra" style="background-color: white;color: white;width: 360px;">
    <div class="col-12 row enlaces">
      <div class="col-2"></div>
      <div class="col-10">
        <img class="logo" itemprop="image" alt="logo <?php echo $nombreEmpresa; ?>" src="<?php echo RUTA_IMG; ?>logo/1.png">
        <div class="d-none d-sm-block">
          <br><br>
          <a href="<?php echo RUTA_PERFIL;?>">Administracion</a>
          <br>
          <a href="<?php echo RUTA_GESTOR_ENTRADAS_BLOG;?>">Gestor blog</a>
          <br>
          <a href="<?php echo RUTA_BLOG;?>">Blog</a>
          <br>
          <a href="<?php echo RUTA_LOGOUT;?>">Salir</a>
          <br><br><br>
          <p style="font-size: 1.2em;letter-spacing: .05em;">Sígueme</p>
          <div class="col-12 row redes">
            <a class="col-2" href="<?php echo $facebookEmpresa;?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a class="col-2" href="<?php echo $instagramEmpresa;?>" target="_blank"><i class="fab fa-instagram"></i></a>
            <a class="col-2" href="<?php echo $behanceEmpresa;?>" target="_blank"><i class="fab fa-behance-square"></i></a>
          </div>
        </div>
        <div class=" d-block d-sm-none">
          <br><br>
          <a href="<?php echo SERVIDOR;?>#inicio-m">Inicio</a>
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
          <a href="<?php echo RUTA_ABOUT;?>">Sobre mi</a>
          <br>
          <a href="<?php echo SERVIDOR;?>#contacto-m">Contacto</a>
          <br><br>
          <p style="font-size: 1.2em;letter-spacing: .05em;">Sígueme</p>
          <div class="col-12 row redes">
            <a class="col-2" href="<?php echo $facebookEmpresa;?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a class="col-2" href="<?php echo $instagramEmpresa;?>" target="_blank"><i class="fab fa-instagram"></i></a>
            <a class="col-2" href="<?php echo $behanceEmpresa;?>" target="_blank"><i class="fab fa-behance-square"></i></a>
          </div>
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
      <div class="d-none d-sm-block">
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
        <a href="<?php echo RUTA_ABOUT;?>">Sobre mi</a>
        <br>
        <a href="<?php echo RUTA_BLOG;?>">Blog</a>
        <br>
        <a href="<?php echo SERVIDOR;?>#contacto">Contacto</a>
        <br><br><br>
        <p style="color: white;font-size: 1.2em;letter-spacing: .05em;">Sígueme</p>
        <div class="col-12 row redes">
          <a class="col-2" href="<?php echo $facebookEmpresa;?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
          <a class="col-2" href="<?php echo $instagramEmpresa;?>" target="_blank"><i class="fab fa-instagram"></i></a>
          <a class="col-2" href="<?php echo $behanceEmpresa;?>" target="_blank"><i class="fab fa-behance-square"></i></a>
        </div>
      </div>
      <div class=" d-block d-sm-none">
        <br><br>
        <a href="<?php echo SERVIDOR;?>#inicio-m">Inicio</a>
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
        <a href="<?php echo RUTA_ABOUT;?>">Sobre mi</a>
        <br>
        <a href="<?php echo SERVIDOR;?>#contacto-m">Contacto</a>
        <br><br>
        <p style="color: white;font-size: 1.2em;letter-spacing: .05em;">Sígueme</p>
        <div class="col-12 row redes">
          <a class="col-2" href="<?php echo $facebookEmpresa;?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
          <a class="col-2" href="<?php echo $instagramEmpresa;?>" target="_blank"><i class="fab fa-instagram"></i></a>
          <a class="col-2" href="<?php echo $behanceEmpresa;?>" target="_blank"><i class="fab fa-behance-square"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#" data-activates="slide-out" class="button-collapse menu"><span class="material-icons">menu</span></a>
<?php
}


        