<div class="row">
    <div class="twelve columns">
        <h1 class="opensans">Dashboard</h1>
        <table class="twelve">
            <thead>
                <tr>
                    <th style="width: 25%;text-align: center;">Nama Kegiatan</th>
                    <th style="width: 25%;text-align: center;">Tipe Kegiatan</th>
                    <th style="width: 20%;text-align: center;">Penyelenggara</th>
                    <th style="width: 20%;text-align: center;">Pemohon</th>
                    <th style="width: 10%;text-align: center;">Poin</th>
                </tr>
            </thead>
            <?php
            foreach ($activities as $activity):
            ?>
            <tr>
                <td><?php echo $activity['Activity']['name'] ?></td>
                <td><?php echo $activity['ActivityType']['activity_name'] ?></td>
                <td><?php echo $activity['Activity']['organizer'] ?></td>
                <td><?php echo $activity['Student']['name']; ?></td>
                <td style="text-align: center;"><?php echo $activity['ActivityType']['point'] ?></td>
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