

document.addEventListener('DOMContentLoaded', () => {
    const calendarEl=document.getElementById('calendar');
    fetch('/api/record')
        .then(response => response.json())
        .then(records => {
            const calendar=new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                events: records.map((record) => {
                    return {
                        title: record.memo,
                        start: record.created_at,
                       
                        // url: `/food/index/${food.id}`,
                          selectable: true,  // 複数日選択可能
    select: function (info) {  // 選択時の処理
        console.log(info)
        
        const eventName = prompt("イベントを入力してください");
        
        // 入力された時に実行される
        if (eventName) {
            // イベントの追加
            calendar.addEvent({
                title: eventName,  // 表示内容
                start: info.start,  // イベント開始
                end: info.end,  // イベント終了
                allDay: true,  // 終日かどうか
            });
        }
    },
 
                    };
                }),
            });
            
   
            calendar.render();
         });
   
   
})