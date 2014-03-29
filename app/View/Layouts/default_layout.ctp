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
        
        /* TinyMCE */
        echo $this->Html->script('tiny_mce');
        
        echo $this->Html->script('modernizr.foundation');
	?>
    
    <script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            theme : "simple"
        });
    </script>

</head>
<body>
    <div class="row">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth', array('params' => array('class' => 'alert-box alert'))); ?>
    </div>

    <!-- Header -->
	<div class="row" style="background-color: #0066af">
		<div class="twelve columns">
            <a href="<?php echo Router::url('/'); ?>"><h1 class="opensans white">SIKAP <small class="white">Sistem Informasi Kualitas Akademik Paramadina</small></h1></a>
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
