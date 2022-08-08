<?php
    include 'koneksi_mysqli.php'; 

    //$sql_event = $pdo->prepare("SELECT * FROM event_timeline ORDER BY id ASC;");
    $sql_event = ("SELECT * FROM event_timeline ORDER BY id ASC");
    // $sql_event->execute();
    // $event = $sql_event->fetchAll();
    $event = mysqli_query($mysqli, $sql_event);
    $event = $event->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" href="style/horizontal-timelinev2.css">
		
		<title>Timeline Jadwal Dinas</title>
        
	</head>
	<body>
       <?php // start print jika show->isset ?>
        <div class="event-container">
            
                <section class="time-line-box">
                    <div class="swiper-container text-center"> 
                        <?php // start loop
                        $count = count($event)/4;
                        $loop = ceil($count);
                        
                        for($i=0; $i<$loop; $i++){
                            $jml_col = 0;
                            $col_start = $i * 4;
                            $col_end = $col_start + 4;
                            if($i % 2 == 1){
                                echo "<div class='swiper-wrapper' style='flex-direction: row-reverse !important;'>";
                            }else{
                                echo "<div class='swiper-wrapper'>";
                            }
                        ?>
                        <?php
                            foreach($event as $evt){
                                if($jml_col >= $col_start && $jml_col < $col_end){// kondisi index start? kondisi max col?
                                    if($evt['checked'] >= 5 && $evt['checked'] < 10){
                                        if($col_end - 1 == $jml_col && $i % 2 == 0){
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked5'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-right-top checked5'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line right checked5'></div>";
                                            }
                                        }
                                        elseif($col_end - 1 == $jml_col && $i % 2 == 1)
                                        {
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line left checked5'></div>";
                                            }
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked5'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-left-top checked5'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 1)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-right-bottom checked5'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='corner-left-top checked5'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 0 && $i != 0)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-left-bottom checked5'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='checked5'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked5'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status checked5'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                    }else if($evt['checked'] >= 10){
                                        if($col_end - 1 == $jml_col && $i % 2 == 0){
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked10'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-right-top checked10'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>"; 
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line right checked10'></div>";
                                            }
                                        }
                                        elseif($col_end - 1 == $jml_col && $i % 2 == 1)
                                        {
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line left checked10'></div>";
                                            }
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked10'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-left-top checked10'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 1)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-right-bottom checked10'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='checked10'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 0 && $i != 0)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-left-bottom checked10'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='checked10'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked10'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status checked10'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                    }else{
                                        // kolom terakhir baris ganjil
                                        if($col_end - 1 == $jml_col && $i % 2 == 0){
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-right-top checked'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line right checked'></div>";
                                            }
                                        }
                                        elseif($col_end - 1 == $jml_col && $i % 2 == 1)
                                        {
                                            if($i+1 != $loop){
                                                echo "<div class='vertical-line left checked'></div>";
                                            }
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status corner-left-top  checked'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 1)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-right-bottom checked'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='checked'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        elseif($col_start == $jml_col && $i % 2 == 0 && $i != 0)
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp line-con corner-left-bottom checked'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='checked'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='swiper-slide'>";
                                            echo "<div class='timestamp checked'><span>" . $evt['latlong'] . "</span></div>";
                                            echo "<div class='status checked'><span>" . $evt['lokasi'] . "</span></div>";
                                            echo "</div>";
                                        }
                                    }
                                }
                                $jml_col++;
                            }
                        ?>
                        </div>
                        </br>
                        <?php   } // end loop 
                                //$mysqli -> close();
                                mysqli_close($mysqli);
                        ?>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
            
        </div>
        <?php // end print jika show->isset ?>