<div class="row">
    <div class="twelve columns">
        <h1 class="opensans">Daftar Follow Up</h1>
        <table class="twelve">
            <thead>
                <tr>
                    <th style="width: 10%;text-align: center;">Nama Kegiatan</th>
                    <th style="width: 35%;text-align: center;">Keterangan</th>
                    <th style="width: 8%;text-align: center;">Status</th>
                    <th style="width: 37%;text-align: center;">Aksi</th>
                </tr>
            </thead>
            <?php
            foreach ($activities as $activity):
            ?>
            <tr>
                <td><?php echo $activity['Activity']['name'] ?></td>
                <td><?php echo $activity['ActivityType']['activity_name'] ?></td>
                <td>
                    <?php echo $this->Sikap->approval_label($activity['Activity']['status'])?>
                </td>
                <td style="text-align: center;">
                    <a href="<?php echo Router::url(array('action' => 'details', $activity['Activity']['id'])); ?>" class="secondary button">Lihat Detail</a>
                    <a href="<?php echo Router::url(array('action' => 'verify', $activity['Activity']['id'])); ?>" class="success button">Verifikasi</a>
                    <a href="<?php echo Router::url(array('action' => 'reject', $activity['Activity']['id'])); ?>" class="alert button">Tolak</a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="twelve columns" style="line-height: 30px; text-align: center;">
            <p>Halaman: <?php echo $this->Paginator->numbers(); ?></p>
        </div>
    </div>
</div>