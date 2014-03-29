    <div class="row">
        <ul class="breadcrumbs">
            <li><a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'dashboard', $student['Student']['id'])) ?>">Home</a></li>
            <li class="current"><a href="#">Data Keaktifan Mahasiswa</a></li>
        </ul>
        
        <div class="twelve columns">
            <h2 class="column-title">Follow Up!</h2>
            <p>
                Segera lakukan <em>follow up</em> langsung ke Direktorat
                Pengembangan Mahasiswa Universitas Paramadina untuk
                aktifitas yang kamu <em>request</em> berikut.
            </p>
            <p>
                <?php
                    foreach ($follow_ups as $follow_up):
                ?>
                <a href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'details', $follow_up['Activity']['id'])) ?>" class="button alert"><?php echo $follow_up['Activity']['name'] ?></a>
                <?php
                    endforeach;
                ?>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="twelve columns">
            <h1 class="opensans">Data Keaktifan</h1>
            <h3 class="opensans subheader">Diverifikasi Oleh Direktorat Pengembangan Mahasiswa</h3>
            <a href="<?php echo Router::url(array('action' => 'add')) ?>" class="button" style="margin-bottom: 30px;">Input Data Keaktifan</a>
        </div>
        <table class="twelve">
            <thead>
                <tr>
                    <th style="width: 20%;text-align: center;">Nama Kegiatan</th>
                    <th style="width: 45%;text-align: center;">Keterangan</th>
                    <th style="width: 10%;text-align: center;">Status</th>
                    <th style="width: 25%;text-align: center;">Aksi</th>
                </tr>
            </thead>
            <?php
            foreach ($activities as $activity):
            ?>
            <tr>
                <td><?php echo $activity['Activity']['name'] ?></td>
                <td><?php echo $activity['ActivityType']['activity_name'] ?></td>
                <td><?php echo $this->Sikap->approval_label($activity['Activity']['status']) ?></td>
                <td style="text-align: center;">
                    <a href="<?php echo Router::url(array('action' => 'details', $activity['Activity']['id'])); ?>" class="secondary button">Lihat Detail</a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
            
        </table>
    </div>
    
    