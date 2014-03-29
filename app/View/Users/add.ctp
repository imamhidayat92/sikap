    <!-- Header -->
	<div class="row" style="background-color: #0066af">
		<div class="twelve columns">
			<h1 class="opensans white">SIKAP <small class="white">Sistem Informasi Kualitas Akademik Paramadina</small></h1>
		</div>
	</div>
    
    <!-- Content -->
    <div class="row">
        <div class="eight columns offset-by-two">
            <h1 class="opensans">Registrasi</h1>
            <?php echo $this->Form->create('Student'); ?>
            
            <?php 
                echo $this->Form->input('Student.name', array(
                    'label' => 'Nama Lengkap'
                ));
                echo $this->Form->input('Student.nickname', array(
                    'label' => 'Nama Panggilan'
                ));
                echo $this->Form->input('Student.birth_date', array(
                    'label' => 'Tanggal Lahir'
                ))
            ?>
            
            
            <?php echo $this->Form->end(); ?>
        </div>
    </div>