<!DOCTYPE html>
<htnl>
    <head>
      
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <form class='calories_form'>
            <dl>
                <dt>体重（kg）：</dt>  
                    <dd><input type="number" class="box" id='b' name="weight"></dd>
                <dt>身長（cm）：</dt>
                    <dd><input type='number' class="box" id='c'  name="ht"></dd>
                <dt>年齢（歳）：</dt>
                    <dd><input type="number" class="box" id='d' name="age"></dd>
                    
                <select name='func' id="select" >
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    
                </select>    
                <p><input type="button" class="calc-btn" onclick="calc(weight.value, ht.value,age.value,func.value);" value="計算"></p>
               
                 <dt>基礎代謝（kcal）</dt>
                <dd><input id="energy" class='box' type="text" readonly=""></dd>
            </d>
        </form>
        


     <form action="/calories" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">日付:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="weight">体重 (kg):</label>
                <input type="number" step="0.1" name="weight" id="weight" class="form-control" required>
            </div>
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
              data:  {!! json_encode($weights->pluck('weight')) !!},
               backgroundColor: ['#4169e1']
            }],
          },
          options: {
            responsive: false
          }
        })
      }
            </script>
        
       
            
</body>
</html>

            
           
        
  
      
    </body>
</htnl>