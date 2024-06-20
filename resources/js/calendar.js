import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from 'axios';

// idがcalendarのDOMを取得
var calendarEl = document.getElementById("calendar");

// カレンダーの設定


let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },

    selectable: true,
    select: function (info) {
        const eventName = prompt("イベントを入力してください");

        if (eventName) {
            axios
                .post(route('event.store'), {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                    name: eventName,
                })
                .then((response) => {
                    // イベントの追加
                    calendar.addEvent({
                        id: response.data.id,
                        title: eventName,
                        start: info.start,
                        end: info.end,
                        allDay: true,
                    });
                })
                .catch(() => {
                    // バリデーションエラーなど
                    alert("登録に失敗しました");
                });
        }
    },
    events: function (info, successCallback, failureCallback) {
        axios
            .post("/calendar/event", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
            })
            .then(response => {
                // 追加したイベントを削除
                calendar.removeAllEvents();
                // カレンダーに読み込み
                successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("取得に失敗しました");
            });
    },
});

// レンダリング
calendar.render();