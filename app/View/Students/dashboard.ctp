    <div class="row">
        <div class="twelve columns">
            <h1 class="opensans">Selamat <?php echo $this->Sikap->greet();?>, <?php echo $student['Student']['nickname']; ?>! :)</h1>
            <p>Selamat datang di Sistem Informasi Kualitas Akademik Paramadina. Apa kabarmu hari ini?</p>
        </div>
    </div>
    
    <!-- Quote -->
    <div class="row">
        <div class="five columns offset-by-seven">
            <blockquote>
                <p><?php echo $quote_text; ?><cite><?php echo $quote_author; ?></cite></p>
            </blockquote>
        </div>
    </div>
    
    <!-- Another Contents -->
    <div class="row">
        <div class="six columns">
            <h2 class="column-title">Terbaru dari Paramadina</h2>
            
            <?php
                foreach ($updates_paramadina as $update):
            ?>
            <div class="four columns">
                <a style="margin: 0 0 10px 0;" class="th" href="<?php echo $update['Post']['url'] ?>">
                    <?php echo $this->Html->image('media/' . $update['Post']['thumbnail_url']); ?>
                </a>
            </div>
            <div class="eight columns">
                <h4 style="margin: 0 0 10px 0;"><?php echo $update['Post']['title'] ?></h4>
                <p><?php echo $update['Post']['excerpt'] ?></p>
                <a href="<?php echo $update['Post']['url']; ?>" class="button secondary" target="_blank">Lihat Berita</a>
            </div>
            <p style="width: 100%; clear: both; height: 10px; display: block;"></p>
            <?php
                endforeach;
            ?>            
        </div>
        <div class="six columns">
            <h2 class="column-title">Artikel Spesial</h2>
            
            <?php
                foreach ($updates_dpm as $update):
            ?>
            <div class="four columns">
                <a style="margin: 0 0 10px 0;" class="th" href="<?php echo $update['Post']['url'] ?>">
                    <?php echo $this->Html->image('media/' . $update['Post']['thumbnail_url']); ?>
                </a>
            </div>
            <div class="eight columns">
                <h4 style="margin: 0 0 10px 0;"><?php echo $update['Post']['title'] ?></h4>
                <p><?php echo $update['Post']['excerpt'] ?></p>
                <a href="<?php echo $update['Post']['url']; ?>" class="button purple-btn" target="_blank">Lihat Tulisan</a>
            </div>
            <p style="width: 100%; clear: both; height: 10px; display: block;"></p>
            <?php
                endforeach;
            ?>
        </div>
    </div>
    
    <!-- Main Navigation-->
    <div class="row" style="margin-bottom: 20px;">
        <h1 class="opensans" style="border-bottom: solid 2px red;">Analisis Akademik dan Non-Akademik</h1>
        <div class="nine columns">
            <div class="seven columns">
                <h3 class="opensans">Analisis Akademik</h3>
                <div id="jqplot-grade" style="height: 300px; margin: 0 0 20px 0;"></div>
                <script>
                    $.jqplot('jqplot-grade',
                            [
                                [
                                     <?php
                                        foreach ($grades as $grade) {
                                            print "[" . $grade["Grade"]["semester"] . ", " . $grade["Grade"]["grade"] . "],";
                                        }
                                     ?>
                                ],
                                [
                                    <?php
                                        $total_point = 0;
                                        $total_grade = 0;
                                        foreach ($grades as $grade) {
                                            $total_point += $grade["Grade"]["point"];
                                            $total_grade += $grade["Grade"]["grade"] * $grade["Grade"]["point"];

                                            print "[" . $grade["Grade"]["semester"] . ", " . number_format($total_grade/$total_point, 2) . "],";
                                        }
                                    ?>
                                ]
                            ], 
                            {
                                seriesColors: ["blue", "red"],
                                animate: true,
                                axes: {
                                    yaxis: {
                                        min: 0,
                                        max: 4,
                                        ticks: [0.0, 1.0, 2.0, 3.0, 4.0]
                                    },
                                    xaxis: {
                                        ticks: [0.5, <?php $i = 0; while ($i++ < $number_of_grade_data) print $i . ","; print $i-1; ?>.5],
                                        tickOptions: {
                                            formatString: "%d"
                                        }
                                    }
                                },
                                grid: {
                                    background: "#ffffff"
                                }
                            });
                </script>
                <p align="center">Grafik Fluktuasi Indeks Prestasi Tiap Semester</p>
                
            </div>
            <div class="five columns">
                <h3 class="opensans">Data Keaktifan</h3>
                <p>Saat ini kamu memiliki:</p>
                <p class="point-label"><?php echo $total_activity_point ?> poin</p>
                <p class="point-label-caption">non-akademik</p>
                
                <table class="twelve">
                    <tbody>
                      <tr>
                        <td style="width: 70%">Jumlah kegiatan yang telah kamu ikuti dan terverifikasi.</td>
                        <td style="width: 30%"><?php echo $total_activity_verified ?></td>
                      </tr>
                      <tr>
                        <td>Jumlah kegiatan yang sedang kamu ajukan</td>
                        <td><?php echo $total_activity_requested ?></td>
                      </tr>                      
                    </tbody>
                </table>
            </div>
            <p class="clearfix"></p>
            <div class="seven columns">
                <a class="success button" style="width: 100%" href="<?php echo Router::url(array('controller' => 'students', 'action' => 'grade', $student['Student']['id'])) ?>">Lihat Analisis >></a>
            </div>
            <div class="five columns">
                <a class="success button" href="<?php echo Router::url(array('controller' => 'activities', 'action' => 'index', $student['Student']['id'])) ?>" style="width: 100%;">Lihat Data >></a>
            </div>
        </div>
        
        
        <div class="three columns">
            <h3 class="opensans">Informasi Akun</h3>
            <table>
                <tbody>
                    <?php foreach ($notifications as $notification):?>
                    <tr>
                        <td>
                            <p><?php echo $notification['Notification']['excerpt'] ?></p>
                            <a href="<?php echo $notification['Notification']['url'] ?>" class="button small">Lihat Tautan</a>
                        </td>
                    </tr>   
                    <?php endforeach;?>
                </tbody>                
            </table>
            <a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'notifications')) ?>" class="button secondary" style="width: 100%">Lihat Semua Notifikasi</a>
            <a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'logout')) ?>" class="button alert" style="width: 100%">Log Out</a>
        </div>
    </div>    