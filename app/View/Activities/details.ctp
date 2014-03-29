<div class="row">
    <div class="six columns offset-by-three">
        <h1 class="opensans" style="border-bottom: solid 2px orange;">Detail Aktifitas</h1>
        
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
        
        <h5 class="activity-label">Status</h5>
        <h4 class="activity-detail">
            <?php if ($activity['Activity']['status'] == -1) { ?>
            Permintaan ini belum di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa Universitas Paramadina.
            <?php } else if ($activity['Activity']['status'] == 0) { ?>
            Permintaan ini harus di-<span style="background-color: red; color: white;"> <em>follow up</em> </span> sesegera mungkin ke Direktorat Pengembangan Mahasiswa
            Universitas Paramadina.
            <?php } else if ($activity['Activity']['status'] == 1) { ?>
            Aktifitas ini telah diverifikasi oleh Direktorat Pengembangan Mahasiswa Universitas Paramadina
            <?php } ?>
        </h4>
        <p>&nbsp;</p>
    </div>
</div>