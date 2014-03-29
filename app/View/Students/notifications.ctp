<div class="row">
    <div class="six columns offset-by-three">
        <h1 class="opensans">Notifikasi</h1>
    </div>
    <table class="six offset-by-three">
        <tbody>
            <?php foreach ($notifications as $notification) {?>
            <tr>
                <td>
                    <p>
                        <p><?php echo $notification['Notification']['notification'] ?></p>
                        <a href="<?php echo $notification['Notification']['url'] ?>" class="button small">Lihat Tautan</a>
                    </p>
                </td>
            </tr>
            <?php } ?>                
        </tbody>
    </table>
</div>