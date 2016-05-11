
      </div>
</div>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="overflow-y: hidden;overflow-x: auto;">
<!-- tuestacion.co -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9510662305061103"
     data-ad-slot="6791881875"
     data-ad-format="auto"></ins>

      </div>
                                                                                       
                                                  
                                                      
    </div><!--/col-12-->
  </div>
</div>
                                                
                                                                                


<!--
<div class="container" id="footer">
  <div class="row">
    <div class="col col-sm-12">
      
      <h1>Follow Us</h1>
      <div class="btn-group">
       <a class="btn btn-twitter btn-lg" href="#"><i class="icon-twitter icon-large"></i> Twitter</a>
     <a class="btn btn-facebook btn-lg" href="#"><i class="icon-facebook icon-large"></i> Facebook</a>
     <a class="btn btn-google-plus btn-lg" href="#"><i class="icon-google-plus icon-large"></i> Google+</a>
      </div>
      
    </div>
  </div>
</div>

<hr>

<hr>-->

<footer>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 center">
        Copyright © <?php echo date('Y'); ?> - <?php echo APP_NAME; ?> - Correo: <a href="mailto:<?php echo APP_EMAIL; ?>"><?php echo APP_EMAIL; ?></a>
        <br/>
          Construido por <a target="_blank" href="">Cuidavet</a>
      </div>
    </div>
  </div>
</footer>

<iframe style="display: none;width: 0px;height: 0px;" id="iframe" name="iframe" src=""></iframe>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js"></script>

    <script src="<?php echo $_layoutParams['ruta_js']; ?>plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js']; ?>plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js']; ?>index.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/datepicker.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap-select.min.js"></script>
    <script src="<?php echo BASE_URL; ?>public/js/bootbox.js"></script>


    <!-- Code base SID JavaScript -->
    <script src="<?php echo BASE_URL; ?>public/js/codeSid.js"></script>

    <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
    <!-- Code Controler JavaScript -->
    <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
    <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
    <?php endfor; ?>
    <?php endif; ?>
    
<div class="lodinnnn"></div>
</body>

</html>