<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="author" content="sid.com.co">
    <link rel="author" href="sid.com.co">

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="cleartype" content="on">

  <!-- iPad and iPad mini (with @2× display) iOS ≥ 8 -->
        <link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-180x180-precomposed.png">
        <!-- iPad 3+ (with @2× display) iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-152x152-precomposed.png">
        <!-- iPad (with @2× display) iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-144x144-precomposed.png">
        <!-- iPhone (with @2× and @3 display) iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-120x120-precomposed.png">
        <!-- iPhone (with @2× display) iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-114x114-precomposed.png">
        <!-- iPad mini and the first- and second-generation iPad (@1× display) on iOS ≥ 7 -->
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-76x76-precomposed.png">
        <!-- iPad mini and the first- and second-generation iPad (@1× display) on iOS ≤ 6 -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-72x72-precomposed.png">
        <!-- Android Stock Browser and non-Retina iPhone and iPod Touch -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-57x57-precomposed.png">
        <!-- Fallback for everything else -->

        <!--
            Chrome 31+ has home screen icon 192×192 (the recommended size for multiple resolutions).
            If it’s not defined on that size it will take 128×128.
        -->
        <link rel="icon" sizes="192x192" href="<?php echo BASE_URL; ?>public/img/touch/touch-icon-192x192.png">
        <link rel="icon" sizes="128x128" href="<?php echo BASE_URL; ?>public/img/touch/touch-icon-128x128.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#333333">
        

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        

        <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php echo APP_NAME;?>">
        <meta name="format-detection" content="telephone=no">

        <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
        

  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>public/img/favicon.ico">
  <title><?php if(isset($this->titulo) && $this->titulo!=''){ echo $this->titulo.' :: ';} ?><?php echo APP_NAME;?></title>

    <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>public/img/logo_ico.png" />
    <meta name="revisit-after" content="1 days">
    <meta property="fb:admins" content="816237496" />
    <meta name="description" content="<?php if(isset($this->description) && $this->description!=''){ echo $this->description.' - '; } ?><?php echo APP_NAME;?> - <?php echo APP_SLOGAN;?>" />

    <title><?php if(isset($this->titulo) && $this->titulo!='') echo $this->titulo.' :: '; ?><?php echo APP_NAME;?></title>
    <meta property="og:image" content="<?php echo BASE_URL; ?>public/img/logo_md4.png" />

    <meta property="og:site_name" content="<?php echo APP_NAME;?>" />
    <meta property="og:title" content="<?php if(isset($this->titulo) && $this->titulo!='') echo $this->titulo.' :: '; ?><?php echo APP_NAME;?>" />
    <meta property="og:url" content="<?php echo BASE_URL; ?>" />
    <meta property="og:description" content="<?php if(isset($this->description) && $this->description!=''){ echo $this->description.' - '; } ?><?php echo APP_NAME;?> - <?php echo APP_SLOGAN;?>" />
    <meta property="og:email" content="c@sid.com.co" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?php echo BASE_URL; ?>"/>
    <meta name="twitter:title" content="<?php if(isset($this->titulo) && $this->titulo!='') echo $this->titulo.' :: '; ?><?php echo APP_NAME;?>"/>
    <meta name="twitter:description" content="<?php if(isset($this->description) && $this->description!=''){ echo $this->description.' - '; } ?><?php echo APP_NAME;?> - <?php echo APP_SLOGAN;?>">
    <meta name="twitter:image" content="<?php echo BASE_URL; ?>public/img/touch/apple-touch-icon-72x72-precomposed.png">
    <meta name="twitter:site" content="<?php echo BASE_URL; ?>" />






  <link href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $_layoutParams['ruta_css']; ?>styles.css" rel="stylesheet">
  <link href="<?php echo $_layoutParams['ruta_fonts']; ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $_layoutParams['ruta_css']; ?>plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL; ?>public/css/bootstrap-select.css" rel="stylesheet" type="text/css">
  <link href="<?php echo BASE_URL; ?>public/css/index.css" rel="stylesheet" type="text/css">
  <?php if( Session::get('autenticado') && SESSION_TIME > 0){?><meta http-equiv="refresh" content="<?php echo (SESSION_TIME*60)+100; ?>"><?php } ?>
  
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
            <script>var BASE={title:'<?php echo $this->titulo; ?>',user:'<?php echo Session::get('id_usuario'); ?>',url:'<?php echo BASE_URL; ?>',name:'<?php echo APP_NAME;?>',m:'<?php echo $this->_presentRequest->getMetodo();?>/',c:'<?php echo $this->_presentRequest->getControlador();?>/'};</script>

            <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
            <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link rel="stylesheet" media="screen" href="<?php echo $_layoutParams['css'][$i] ?>">
          <?php endfor; ?>
        <?php endif; ?>
        <script src="<?php echo BASE_URL; ?>public/js/jquery-2.1.0.min.js"></script>
      </head>
      <body>
        <div class="modal fade" id="myModal-default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
        <header class="navbar navbar-bright navbar-fixed-top" role="banner">
          <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="<?php echo BASE_URL; ?>" class="navbar-brand visible-xs-block"><?php echo APP_NAME; ?></a>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
              <ul class="nav navbar-nav">
                <?php $_item_style='';$_item_menu=''; ?>
                <?php if(isset($_layoutParams['menu'])){ ?>
                <?php for($i = 0; $i < count($_layoutParams['menu']); $i++){ ?>

                <?php if (array_key_exists('sub', $_layoutParams['menu'][$i])) { 
                     $_item_style.= ' dropdown'; 
                  ?>
                <?php 
                if($item && $_layoutParams['menu'][$i]['id'] == $field ){ 
                  $_item_style.= 'active'; 
                  $_item_menu = $_layoutParams['menu'][$i]['titulo'];
                } else {
                  $_item_style.= '';
                }
                ?>
                <li class="<?php echo $_item_style; ?>">
                  <a lass="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#"><?php echo $_layoutParams['menu'][$i]['ico']; ?><?php echo $_layoutParams['menu'][$i]['titulo']; ?><span class="fa arrow"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <?php for($j = 0; $j < count($_layoutParams['menu'][$i]['sub']); $j++){ ?>
                    <?php 
                    if($item && $_layoutParams['menu'][$i]['sub'][$j]['id'] == $item ){ 
                      $_item_style = 'active'; 
                    } else {
                      $_item_style = '';
                    }
                    ?>
                    <li>
                      <a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['sub'][$j]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['sub'][$j]['ico']; ?><?php  echo $_layoutParams['menu'][$i]['sub'][$j]['titulo']; ?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </li>
                <?php }else{  ?>
                <?php 
                if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
                  $_item_style = 'active';
                  $_item_menu = $_layoutParams['menu'][$i]['titulo']; 
                } else {
                  $_item_style = '';
                }
                ?>
                <li>
                  <a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php echo $_layoutParams['menu'][$i]['ico']; ?><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a>
                </li>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php if( $_item_menu==''){$_item_menu=$item;} ?>
                <?php if( $h2!=''){$_item_menu=$h2;} ?>
        <!--<li>
          <a href="#">Category</a>
        </li>
        <li>
          <a href="#">Category</a>
        </li>
        <li>
          <a href="#">Category</a>
        </li>
        <li>
          <a href="#">Category</a>
        </li>-->
      </ul>
      <?php if(Session::get('autenticado')){ ?>
      <ul class="nav navbar-right navbar-nav">
        <li class="dropdown">
            <li><a href="<?php echo BASE_URL; ?>login/cambiar/"><i class="fa fa-cogs fa-fw"></i> Cambiar Clave</a></li>
            <li><a href="<?php echo BASE_URL; ?>login/cerrar/"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a></li>
        </li>
      </ul>
      <?php } ?>
    </nav>
  </div>
</header>

<div id="masthead">  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--<h1 style="min-height: 35px; font-size: 35px;  line-height: 35px;  margin-top: 62px;">
          <?php //echo APP_NAME;//echo Session::get('nombre');?>
          <!--<img class="img-responsive" alt="logo" src="<?php echo $_layoutParams['ruta_img']; ?>logo.png">-->
          <!--<p class="lead"></p>
        </h1>-->
          <img style="margin: 30px auto;width:100%; max-width: 130px;" src="<?php echo BASE_URL.'public/img/'; ?>logo_banner.png" class="img-responsive" alt="Image">
      </div>
      <div class="col-md-5">
        <!--<div class="well well-lg"> 
          <div class="row">
            <div class="col-sm-12">
              
            
            </div>
          </div>
        </div>-->
      </div>
    </div>
    <!--<?php if(Session::get('autenticado')){ ?>
        <div class="text-right" id="user">
          <?php echo Session::get('nombre'); ?>
          <a title="Cerrar Sesion" href="<?php echo BASE_URL; ?>login/cerrar/"><i class="fa fa-sign-out fa-fw"></i></a>
        </div>
    <?php } ?> -->
  </div><!-- /cont -->
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="top-spacer"> </div>
      </div>
    </div> 
  </div><!-- /cont -->
  
</div>


<div class="container margin-cero">
  <div class="row">

    <div class="col-md-12"> 

      <div style="border-color:transparent !important;" class="panel">
        <div class="panel-body">
          <h2 class="title">
            <?php echo $_item_menu; ?>
            <!--<div class="pull-right hidden-xs">
                <a title="Disponible en google play store" class="btn btn-social-icon btn-android" target="_black" href="https://play.google.com/store/apps/details?id=co.tuestacion">
                  <i class="fa fa-android pull-left"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo BASE_URL.$this->_url; ?>" class="btn btn-social-icon btn-facebook popup">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="https://plus.google.com/share?url=<?php echo BASE_URL.$this->_url; ?>" class="btn btn-social-icon btn-google-plus popup">
                  <i class="fa fa-google-plus"></i>
                </a>

                <a href="http://twitter.com/home?status=<?php echo $this->titulo; ?>%20<?php echo BASE_URL.$this->_url; ?>" class="btn btn-social-icon btn-twitter popup">
                  <i class="fa fa-twitter"></i>
                </a>
            </div>-->
          </h2>

          <div class="col-lg-12"  id="alert" >
            <?php if(Session::get('error')): ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo Session::get('error');Session::destroy("error"); ?>
            </div>
          <?php endif; ?>

          <?php if(Session::get('mensaje')): ?>
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo Session::get('mensaje');Session::destroy("mensaje");  ?>
          </div>

        <?php endif; ?>

                    <!--<div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                              </div>--> 
                            </div>
                            <div class="clearfix"></div>