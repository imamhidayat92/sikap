<div class="row">
    <div class="six columns offset-by-three">
        <h1 class="opensans bg-orange" style="color: white;">Persetujuan</h1>
        <h2 class="opensans">Anda akan melakukan persetujuan pada aktifitas berikut untuk di <em>follow up</em>.</h2>
        
        <div class="bg-red separator"></div>
        
        <h5 class="activity-label">Pemohon</h5>
        <h4 class="activity-detail"><?php echo $activity['Student']['name'] ?></h4>
        <h4 class="activity-detail">NIM. <?php echo $activity['Student']['id'] ?></h4>
        
        <h5 class="activity-label">Nama Kegiatan</h5>
        <h4 class="activity-detail"><?php echo $activity['Activity']['name'] ?></h4>
        
        <h5 class="activity-label">Tipe Kegiatan</h5>
        <h4 class="activity-detail"><?php echo $activity['ActivityType']['activity_name'] ?></h4>
        
        <h5 class="activity-label">Penyelenggara</h5>
        <h4 class="activity-detail"><?php echo $activity['Activity']['organizer'] ?></h4>
        
        <h5 class="activity-label">Tanggal Pelaksanaan</h5>
        <h4 class="activity-detail"><?php echo $activity['Activity']['activity_date'] ?></h4>
        
        <h5 class="activity-label">Ringkasan</h5>
        <div class="activity-descriptions">
            <?php echo $activity['Activity']['summary'] ?>
        </div>
        
        <div class="bg-red separator"></div>
        
        <h2 class="opensans">Apakah Anda yakin?</h2>
        <div style="text-align: right;">
            <form method="POST" action="<?php echo Router::url(array('controller' => 'activities', 'action' => 'approve', $activity['Activity']['id'])) ?>">
                <input type="hidden" name="data[Activity][id]" value="<?php echo $activity['Activity']['id'] ?>"/>
                <a href="<?php echo Router::url(array('action' => 'requests')) ?>" class="button secondary">Tidak</a>
                <input type="submit" class="button alert" value="Ya"/>
            </form>
        </div>
        
    </div>
</div>