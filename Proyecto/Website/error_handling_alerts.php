
 <?php if(isset($error)): ?>
    <!--En este php lo que se hace es crear un alert box que el usuario puede cerrar después de haber visto los errores que hizo-->
        <br>
        <div class="row my_alert" id="alert_box">
          <div class="col s12 m12">
            <div class="card red darken-1">
              <div class="row">
                <div class="col s12 m10">
                  <div class="card-content white-text">
                    <p><?=$error ?></p>
                </div>
              </div>
              <div class="col s12 m2">
                <i class="material-icons prefix close_style" id="alert_close"  aria-hidden="true">close</i>
              </div>
            </div>
           </div>
          </div>
        </div>
<?php endif ?>