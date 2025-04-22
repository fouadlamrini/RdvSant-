import dataset from "./event";
import { Calendar } from "@fullcalendar/core";
import listPlugin from "@fullcalendar/list";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
// import resourceTimelinePlugin from "@fullcalendar/resource-timeline";

const calendarEl = document.querySelector("#app");

let calendar = new Calendar(calendarEl, {
  height: 900,
  aspectRatio: 2,
  plugins: [listPlugin, dayGridPlugin, timeGridPlugin],
  defaultView: "timeGridWeek",
  events: [
    {
      id: 1,
      title: "Meeting",
      start: "2020-04-12T14:30:00",
      extendedProps: {
        status: "done"
      }
    },
    {
      id: 2,
      title: "Birthday Party",
      start: "2020-04-08T07:00:00",
      backgroundColor: "green",
      borderColor: "green",
      extendedProps: { status: "wholeleel" }
    }
  ],
  eventRender: function(info) {
    // Change background color of row
    // info.el.style.backgroundColor = "red";
    // console.log(info);
    const node = document.createElement("button");
    node.innerHTML = "button";
    node.classList.add("btn");
    // console.log(info.event.extendedProps);
    node.dataset.status = JSON.stringify(info.event.extendedProps);
    info.el.querySelector(".fc-title").appendChild(node);
    // Change color of dot marker
    var dotEl = info.el.getElementsByClassName("fc-event-dot")[0];
    if (dotEl) {
      dotEl.style.backgroundColor = "white";
    }
  }
});
calendarEl.addEventListener("click", (e, data) => {
  if (e.target.classList.contains("btn")) {
    console.log(JSON.parse(e.target.dataset.status));
  }
});
const events = [];
dataset.forEach(el => {
  const event = el;
  event.start = new Date(el.date * 1000);
  events.push(event);
});
// console.log(events);
calendar.addEventSource(events);
calendar.render();
// calendar.changeView("dayGridWeek", "2020-04-08");
calendar.changeView("dayGridMonth", "2020-04-08");
// calendar.changeView("listWeek", "2020-04-08");
