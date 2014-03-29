<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> - Sistem Informasi Kualitas Akademik Paramadina
	</title>
	<?php
        /* Included JS Files (Compressed) */
        echo $this->Html->script('jquery-1.8.3.min');
        echo $this->Html->script('foundation.min');

        /* Initialize JS Plugins */
        echo $this->Html->script('app');
    
        /* Foundation */
        echo $this->Html->css('foundation.min');
        echo $this->Html->css('general_enclosed_foundicons');
        echo $this->Html->css('general_enclosed_foundicons_ie7');
        echo $this->Html->css('social_foundicons');
        echo $this->Html->css('social_foundicons_ie7');
                
        /* Google Fonts */
        echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:300');
        
        /* jqPlot */
        echo $this->Html->css('jquery.jqplot.min');
        echo $this->Html->script('jquery.jqplot.min');
        
        /* Default Apps */
        echo $this->Html->css('sikap');
        
        echo $this->Html->script('modernizr.foundation');
	?>
</head>
<body>    
    <div class="row">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth', array('params' => array('class' => 'alert-box alert'))); ?>
    </div>

    <!-- Header -->
	<div class="row">
        <nav class="top-bar">
            <?php if (AuthComponent::user()): ?>
            <ul>
                <li class="name"><h1><a href="#"><?php echo $this->Sikap->user_type(AuthComponent::user('account_type')) ?></a></h1></li>
                <li class="toggle-topbar"><a href="#"></a></li>
            </ul>
            <section>
                <ul class="left">                  
                    <li class="divider"></li>
                <?php 
                    switch (AuthComponent::user('account_type')):
                        case 1:
                ?>                   
                        <li><a href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'dashboard')) ?>">Dashboard</a></li>
                        <li><a href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'requests')) ?>">Daftar Request</a></li>
                        <li><a href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'follow_ups')) ?>">Follow Up</a></li>
                        <li><a href="<?php echo Router::url(array('controller' => 'posts', 'action' => 'index')) ?>">Atur Posting</a></li>                        
                <?php 
                            break;
                        case 2:
                ?>

                <?php 
                            break;
                        case 3:
                ?>
                    <li><a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'dashboard')) ?>">Dashboard</a></li>
                    <li><a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'grade')) ?>">Analisis Akademik</a></li>
                    <li><a href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'index')) ?>">Poin Keaktifan</a></li>
                <?php 
                    endswitch; 
                ?>
                </ul>

                <ul class="right">
                    <li><a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'logout')) ?>">Logout</a></li>
                </ul>
            </section>
            <?php else: /*?>
            <section>                
                <ul class="right">
                    <li><a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'login')) ?>">Masuk</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'register')) ?>">Daftar</a></li>
                </ul>
            </section>
            <?php */endif; ?>
        </nav>
    </div>
    <div class="row" style="background-color: #0066af">
        <div class="twelve columns">
            <a href="<?php if (AuthComponent::user('account_type') == 3): echo Router::url(array('controller' => 'students', 'action' => 'dashboard')); else: echo Router::url(array('controller' => 'activities', 'action' => 'dashboard')); endif; ?>"><h1 class="opensans white">SIKAP <small class="white">Sistem Informasi Kualitas Akademik Paramadina</small></h1></a>
		</div>
	</div>
    
	<?php echo $this->fetch('content'); ?>
    
    <div class="footer row">
        <div class="nine columns">
            <p>&nbsp;</p>
            <p class="opensans" style="line-height: 15px;">
                Copyright &copy; Universitas Paramadina 1998 - 2013 <br/>
                Jl. Jend. Gatot Subroto, Kav. 97 <br/>
                Mampang Prapatan, Jakarta Selatan
            </p>
            
        </div>
        <div class="three columns">
            <?php echo $this->Html->image('paramadina.jpg') ?>
        </div>
    </div>
</body>
</html>
