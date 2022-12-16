<!DOCTYPE html>
<?
     include "../../lotteworld_db.php";
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>LOTTE | ADMIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
        *{
            font-family: 'Jeju Gothic', sans-serif;
        }
        /* #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        } */
        </style>
    </head>
    <body>
        <?
            include "lotteworld_admin_top.php";
        ?>
        <!--상단 네비게이션 바-->
        <div class="d-flex justify-content-start">
            <?  
            include "lotteworld_admin_side.php";

            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">일별 예매내역 그래프</h5>
                    <div class="col-11">
                        <div class="main">
                            <div class="col-9" class="chart-container" style=" width:900px;height:450px;">
                                <canvas id="test1"></canvas>
                            </div>
                            <?
                                for($i=0;$i<5;$i++){
                                    $day[$i] = date('Y-m-d',strtotime("-$i days"));
                                    $day2 = date('Y-m-d',strtotime("-$i days"));

                                    // $sql = "select * from lotteworld_reserve where date = '".$day."'";
                                    // $query = $conn->query($sql);
                                    // $date[$i] = mysqli_fetch_array($query); 
                                    
                                    $yoil = array("일","월","화","수","목","금","토");
                                    $yoils[$i] = ($yoil[date('w', strtotime($day[$i]))]);

                                    $sql2 = "select count(*) as cnt from lotteworld_reserve where date = '".$day2."'";
                                    $query2 = $conn->query($sql2);
                                    $cnt[$i] = mysqli_fetch_array($query2);
                            }
                            ?>
                        <script>
                            var ctx = document.getElementById('test1').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'line',
                                // The data for our dataset
                                data: {
                                        labels: [
                                            '<?=$day[4]."(".$yoils[4].")"?>',
                                            '<?=$day[3]."(".$yoils[3].")"?>',
                                            '<?=$day[2]."(".$yoils[2].")"?>',
                                            '<?=$day[1]."(".$yoils[1].")"?>',
                                            '<?=$day[0]."(".$yoils[0].")"?>'
                                        ],
                                        datasets: [{
                                                label:'none-title',
                                                borderColor: [
                                                    '#5a07e0'
                                                ],
                                        data: [<?=$cnt[0]['cnt']?>,<?=$cnt[1]['cnt']?>,<?=$cnt[2]['cnt']?>,<?=$cnt[3]['cnt']?>,<?=$cnt[4]['cnt']?>],
                                        fill: true,
                                        lineTension: 0 //선 그래프 각지게 
                                    }]
                                },

                                // Configuration options go here
                                options: {
                                    title: {
                                        display: true,
                                        text: '일별 예매 수치',
                                        fontSize: 24,
                                        fontColor: 'rgba(46, 49, 49, 1)'
                                    },
                                    legend: {
                                        labels: {
                                            fontColor: 'rgba(83, 51, 237, 1)',
                                            fontSize: 15
                                        }
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                fontColor: 'rgba(27, 163, 156, 1)',
                                                fontSize: '15'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                fontColor: 'rgba(246, 36, 89, 1)',
                                                fontSize: '15',
                                                stepSize: 1,
                                                min: 0
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

