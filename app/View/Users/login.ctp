<div class="row" style="margin-top: 30px;">
    <div class="eight columns">
        <a href="#" class="th" style="margin: 0 0 10px 0;"><?php echo $this->Html->image('depan.jpg'); ?></a>
        <p align="center"><em>Dies Natalis Universitas Paramadina, Tahun 2013</em></p>
    </div>
    <div class="four columns">
        <p>Gunakan <em>account</em> yang telah Anda miliki
        dari Universitas Paramadina untuk masuk ke dalam sistem.</p>
        <h1 class="opensans">Login</h1>
        <?php 
            echo $this->Form->create('User');
        ?>

        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
        <input type="submit" value="Masuk" class="button"/>
        <?php
            echo $this->Form->end();
        ?>
    </div>
    
</div>