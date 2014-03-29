<div class="row">
    <div class="six columns offset-by-three">
        <h1 class="opensans">Registrasi Account <small>Mahasiswa</small></h1>
        <div class="six columns offset-by-three">
            <legend>Autentikasi</legend>
            <?php
                echo $this->Form->create('User');
                echo $this->Form->input('username');
                echo $this->Form->input('password');
            ?>
            
            <legend>Data Mahasiswa</legend>
            <?php 
                echo $this->Form->input('account_id', array('label' => 'Nomor Induk Mahasiswa', 'type' => 'text'));
            ?>
            <input type="submit" value="Daftar" class="button"/>
            <?php
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>