	<!-- Content -->
	<div class="row">
        <ul class="breadcrumbs">
            <li><a href="<?php echo Router::url(array('controller' => 'students', 'action' => 'dashboard', $student['id'])) ?>">Home</a></li>
            <li class="current"><a href="#">Analisis Kualitas Akademik</a></li>
        </ul>
        <div class="twelve columns">
            
            <h3 class="opensans">
                Hai <?php echo $student['nickname']; ?>, ini adalah analisis sistem terhadap
                data akademik yang kamu miliki. :)
            </h3>

            <p>Ada 3 aspek yang diukur oleh sistem ini untuk menginterpretasikan situasi kamu yaitu
                data <strong>Indeks Prestasi</strong>, <strong>Indeks Prestasi Kumulatif</strong>, <strong>Skor <em>Paramadina
                    English Proficiency Test</em></strong> dan <strong>Poin Keaktifan Non-Akademik</strong>.</p>
        </div>
    </div>
    
    <div class="row">
        <div class="two columns">
            <h1 class="section-label">Fluktuasi Indeks Prestasi</h1>
        </div>
        <div class="ten columns">
            <p>Saat ini kamu berada di <strong>semester <?php echo $current_semester+1; ?></strong>. Ini adalah
            rekaman data nilai akademik kamu beserta analisisnya.</p>
        
            <div id="jqplot-grade" style="width: 100%; height: 300px; margin: 0 0 30px 0;"></div>
            <script>
                    $.jqplot('jqplot-grade',
                            [
                                [
                                     <?php
                                        foreach ($data as $grade) {
                                            print "[" . $grade["Grade"]["semester"] . ", " . $grade["Grade"]["grade"] . "],";
                                        }
                                     ?>
                                ],
                                [
                                    <?php
                                        $total_point = 0;
                                        $total_grade = 0;
                                        foreach ($data as $grade) {
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
                                series: [
                                    {
                                        label: 'Indeks Prestasi'
                                    },
                                    {
                                        label: 'Indeks Prestasi Kumulatif'
                                    }
                                ],
                                legend: {
                                    show: true,
                                    location: 'se'
                                },
                                grid: {
                                    background: "#ffffff"
                                }
                            });
                </script>
            
            <table class="twelve">
                <thead>
                    <tr>
                        <th style="width: 10%;text-align: center;">Semester</th>
                        <th style="width: 5%;text-align: center;">IP</th>
                        <th style="width: 5%;text-align: center;">IPK</th>
                        <th style="width: 10%;text-align: center;">SKS</th>
                        <th style="width: 52%;text-align: center;">Interpretasi</th>
                        <th style="width: 18%;text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    /* Calculation Logics */

                    $i = 0;

                    $tmp_sum_sks = 0.0;
                    $tmp_sum_ip = 0.0;

                    $max_ip = 0.0;
                    $max_ipk = 0.0;

                    $prev = 0.0;
                    $cumulative_prev = 0.0;

                    foreach ($data as $datum) {
                        $i++;

                        $tmp_sum_ip += $datum['Grade']['grade']*$datum['Grade']['point'];
                        $tmp_sum_sks += $datum['Grade']['point'];

                        $cumulative_grade = number_format($tmp_sum_ip/$tmp_sum_sks, 2);

                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $datum['Grade']['semester']?></td>
                        <td style="text-align: center"><?php echo $datum['Grade']['grade']?></td>
                        <td style="text-align: center"><?php if ($i == 1) echo "-"; else echo $cumulative_grade; ?></td> 
                        <td style="text-align: center"><?php echo $datum['Grade']['point'] ?></td>
                        <td style="text-align: center"><?php echo $this->Sikap->generate_ip_bar($datum['Grade']['grade'], $datum['Grade']['point'], $total_acc) ?></td>
                        <td style="text-align: center"><?php if ($i > 1){ ?>IP: <?php echo $this->Sikap->up_down_indicator($prev, $datum['Grade']['grade']) ?> IPK: <?php echo $this->Sikap->up_down_indicator($cumulative_prev, $cumulative_grade) ?><?php } else { ?> - <?php } ?></td>
                    </tr>
                    <?php 

                        if ($i > 1) {
                            if ($max_ipk <= $cumulative_grade) {
                                $max_ipk = $cumulative_grade;
                            }

                            if ($max_ip <= $datum['Grade']['grade']) {
                                $max_ip = $datum['Grade']['grade'];
                            }
                        }

                        $prev = $datum['Grade']['grade'];
                        $cumulative_prev = $cumulative_grade;
                    }
                    ?>
                </tbody>
            </table>
        
            <!-- Computer Messages -->
            <p style="font-size: 22px;">
                <?php if ($this->Sikap->is_up($data[$i-2]['Grade']['grade'], $data[$i-1]['Grade']['grade'])) { ?>
                Indeks Prestasi kamu mengalami kenaikan di semester ini, dari <span class="success label"><?php echo $data[$i-2]['Grade']['grade'];?></span>
                menjadi <span class="success label"><?php echo $data[$i-1]['Grade']['grade']; ?></span>. :)
                <?php } else { ?>
                Indeks Prestasi kamu mengalami penurunan di semester ini, dari <span class="success label"><?php echo $data[$i-2]['Grade']['grade'];?></span>
                menjadi <span class="alert label"><?php echo $data[$i-1]['Grade']['grade']; ?></span>. :(
                <?php } ?>
                Indeks Prestasi tertinggi yang pernah kamu raih adalah <span class="success label"><?php echo $max_ip ?></span> dan Indeks Prestasi Kumulatif
                tertinggi yang pernah kamu raih adalah <span class="success label"><?php echo $max_ipk; ?></span>.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <h1 class="section-label">Perkiraan Masa Studi</h1>
        </div>
        <div class="ten columns">
            <?php
                $total_days = date_diff(new DateTime($start_date), new DateTime())->format('%a');
            ?>
            <p><strong>Analisis Berdasarkan SKS</strong></p>
            <div class="progress twelve"><span style="width: <?php echo ceil(($total_sks/144)*100); ?>%; hten: 100%;" class="meter"><h1><?php echo $total_sks; ?> SKS</h1></span></div>
            <p>Saat ini, kamu sudah menjalani kuliah di Universitas Paramadina selama <strong><em><?php echo $this->Sikap->generate_time_info($total_days) ?></em></strong>. Jumlah SKS yang telah
                kamu selesaikan adalah <?php echo $total_sks?> SKS dari 144 SKS yang ada, <span class="success label"><?php echo number_format((144-$total_sks)/144*100, 2);?>%</span> lagi persentase SKS
                yang harus kamu selesaikan untuk lulus. ;) Jika kamu disiplin,
            kamu bisa menyelesaikan kuliah kamu dalam <span class="success label"><?php echo ceil((144-$total_sks)/24)-1; ?> semester</span> lagi.</p>    
            
            
            
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <h1 class="section-label">Aspek Akademik Lainnya</h1>
        </div>
        <div class="ten columns">
            <h4 class="opensans" style="margin: 0">Paramadina English Proficiency Test</h4>
            <table class="four" style="margin: 20px 0 20px 0;">
                <thead>
                    <tr>
                        <th style="width: 40%;text-align: center;">Semester</th>
                        <th style="width: 60%;text-align: center;">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($english_tests as $data):?>
                    <tr>
                        <td style="text-align: center"><?php echo $data['EnglishTest']['semester']; ?></td>
                        <td style="text-align: center"><?php echo $data['EnglishTest']['score']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="twelve columns">
            <p align="center"><em>Tetap semangat, <?php echo $student['nickname']; ?><?php ?>! :)</em></p>
        </div>
    </div>

    <?php
    /*
    print '<pre>';
    print '------------------------------------ Data For Debugging Purpose ----------------------------------------<br/><br/>';
    print_r($data);
    print '<br/>' . $i;
    print '</pre>';
    */
    // die();
    ?>