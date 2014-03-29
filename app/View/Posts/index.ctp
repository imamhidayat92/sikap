<div class="row">
    <div class="twelve columns">
        <h1 class="opensans">Manajemen Posting</h1>
        <a class="button" href="<?php echo Router::url(array('action' => 'add')) ?>">Buat Post Baru</a>
        <p class="clearfix" style="margin: 20px 0 0 0;"></p>
    </div>
    <table class="twelve">
        <thead>
            <tr>
                <th style="width: 30%; text-align: center;">Judul</th>
                <th style="width: 20%; text-align: center;">Tanggal Pembuatan</th>
                <th style="width: 10%; text-align: center;">Penulis</th>
                <th style="width: 40%; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($posts as $post):
            ?>
            <tr>
                <td><?php echo $post['Post']['title'] ?></td>
                <td><?php echo $post['Post']['created'] ?></td>
                <td><?php echo $post['User']['username'] ?></td>
                <td style="text-align: center">
                    <a href="<?php echo Router::url(array('action' => 'edit', $post['Post']['id'])); ?>" class="button secondary">Edit</a>
                    <a href="<?php echo Router::url(array('action' => 'delete', $post['Post']['id'])); ?>" class="button alert">Hapus</a>
                </td>
            </tr>    
            <?php
                endforeach;
            ?>
            
            
        </tbody>
    </table>
    <div class="twelve columns" style="line-height: 30px; text-align: center;">
        <p>Halaman: <?php echo $this->Paginator->numbers(); ?></p>
    </div>
</div>