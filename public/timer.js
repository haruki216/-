//   window.onload = function() {
// const time = document.getElementById('timer');
// const startButton = document.getElementById('start');
// const stopButton = document.getElementById('stop');
// const resetButton = document.getElementById('reset');

// let startTime;
// let stopTime = 0;
// let timeoutID;

// function displayTime(){
//     const currentTime = new Date(Date.now() - startTime + stopTime);
//     const h = string(currentTime.getHours()-1).padStart(2,'0');
//     const m = string(currentTime.getMinutes()).padStart(2,'0');
//     const s = string(currentTime.getSeconds()).padStart(2,'0');
//     const ms = string(currentTime.getMilliseconds()).padStart(3,'0');
    
//     time.textContent = '${h}:${m}:${s}.${ms}';
//     timeoutID = setTimeout(displayTime,10);
// }


// startButton.addEventListener('click', () => {
    
//   startButton.disabled = true;
//   stopButton.disabled = false;
//   resetButton.disabled = true;
//   startTime = Date.now();
//   displayTime();
// });

// stopButton.addEventListener('click', function() {
//   startButton.disabled = false;
//   stopButton.disabled = true;
//   resetButton.disabled = false;
//   clearTimeout(timeoutID);
//   stopTime += (Date.now() - startTime);
// });

// resetButton.addEventListener('click', function() {
//   startButton.disabled = false;
//   stopButton.disabled = true;
//   resetButton.disabled = true;
//   time.textContent = '00:00:00.000';
//   stopTime = 0;
// });
// };