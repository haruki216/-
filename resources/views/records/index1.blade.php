<?php
date_default_timezone_set('Asia/Tokyo');
 
if(isset($_GET['ym'])){ 
    $ym = $_GET['ym'];
}else{
    $ym = date('Y-m');
}
 

$timestamp = strtotime($ym . '-01'); 
if($timestamp === false){
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
 
$today = date('Y-m-j');
 
$html_title = date('Y年n月', $timestamp);
 

$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));
 
$day_count = date('t', $timestamp);
 

$youbi = date('w', $timestamp);
 
$weeks = [];
$week = '';
 
 $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '19741021Mh');

// 全メモを取得
$records = [];
$stmt = $pdo->query("SELECT memo FROM records");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $records[$row['date']] = $row['memo'];
}

$week .= str_repeat('<td></td>', $youbi);
 
for($day = 1; $day <= $day_count; $day++, $youbi++){
    
    $date = $ym . '-' . $day; 
     $link = '<a href="/date/' . $date .'">' . $day . '</a>';
     
    if($today == $date){
        
        $week .= '<td class="today">' . $link . '</td>';
    } else {
        $week .= '<td>' . $link. '</td>';
    }
    
     if (isset($memos[$date])) {
        $link .= '<br><span style="font-size: 0.8em;">&#9998;</span>';
    }

    $week .= '<td ' . $class . '>' . $link . '</td>';
  
    
    if($youbi % 7 == 6 || $day == $day_count){
        
        if($day == $day_count){
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }
        
        $weeks[] = '<tr>' . $week . '</tr>'; 
        
        $week = '';
    }
}
    
?>
 
 
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHPカレンダー</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
      .container {
        font-family: 'Noto Sans', sans-serif;
          margin-top: 80px;
      }
        h3 {
            margin-bottom: 30px;
        }
        th {
            height: 30px;
            text-align: center;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }
        th:nth-of-type(1), td:nth-of-type(1) {　
           color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
    </style>
</head>
<body>
  
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>">&gt;</a><a href='/detail/date/create'>create</a></h3>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
             <?php
             
                foreach ($weeks as $week){
                    echo $week;}
                    
            ?>
        </table>
    </div>
</body>
</html>
  <meta charset="UTF-8" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
        <title>体重管理</title>
   <form action='/calories/store' method="post">
             @csrf
             
            <dt>日付</dt>
                <dd><input placeholder='0601'  name='data' id='date'></dd>
            <dt>体重（kg）</dt>
                <dd><input type='number' class="box" name='weight'id='weight' ></dd>
             <button type="submit" class="btn btn-primary">Add Weight</button>
        </form>
        
        
         <canvas id="people_weight_chart" width="500" height="500"></canvas>
         <script>
           window.onload = function () {
        let context = document.querySelector("#people_weight_chart").getContext('2d')
        new Chart(context, {
          type: 'line',
          data: {
            labels:  {!! json_encode($weights->pluck('date')) !!},
            datasets: [{
              label: "体重記録",
              data:  {!! json_encode($weights->pluck('date')) !!},
               backgroundColor: ['#4169e1']
            }],
          },
          options: {
            responsive: false
          }
        })
      }
            </script>
             
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('lineChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($weights->pluck('date')) !!},
                    datasets: [{
                        label: 'Weight (kg)',
                        data: {!! json_encode($weights->pluck('weight')) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>