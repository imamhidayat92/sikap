<div class="row">
    <ul class="breadcrumbs">
        <li><a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'dashboard')) ?>">Home</a></li>
        <li class="current"><a href="#">Input Data Keaktifan</a></li>
    </ul>
    <div class="four columns">
        <h1 class="column-title">Prosedur Pengajuan Poin Non-Akademik</h1>
    </div>
    <div class="eight columns">
        <h1 class="opensans">Input Data Keaktifan</h1>
        <?php 
            echo $this->Form->create('Activity');
            echo $this->Form->input('name', array('label' => 'Nama Kegiatan'));
            echo $this->Form->input('student_id', array(
                'type' => 'hidden',
                'value' => AuthComponent::user('account_id')
            ))
        ?>
            <label>Tipe Kegiatan</label>
        <?php            
            echo $this->Form->select('type', $activity_types);
            echo $this->Form->input('organizer', array('label' => 'Penyelenggara'));
            echo $this->Form->input('summary', array('type' => 'textarea', 'label' => 'Ringkasan Kegiatan'));
            echo $this->Form->input('activity_date', array('label' => 'Tanggal Pelaksanaan Kegiatan'));
        ?>
            <p class="clear" style="height: 10px;"></p>
            <input type="submit" value="Tambahkan Data" class="button" style="float: right"/>
        <?php 
            echo $this->Form->end();
        ?>
            <p class="clear" style="height: 10px;"></p>
    </div>
</div>