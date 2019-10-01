var schedules = JSON.parse(document.getElementById("obj-schedules").innerHTML);

console.log(schedules);

initCalendar();

async function initCalendar(){
    let data = await genEvents(schedules);
    await $('#calendar').fullCalendar(data);
}

async function genEvents(schedules){
    var data = {events: []};
    schedules.forEach(async element => {
        let date = await element.startDate.split(" ")[0];
        let obj = {
            title: element.course.title,
            start: date
        };
        await data.events.push(obj);
    });
    return data;
}

/*$('#calendar').fullCalendar({
    events: [
      {
        title  : 'event1',
        start  : '2019-10-01'
      },
      {
        title  : 'event2',
        start  : '2019-10-05',
        end    : '2019-10-07'
      },
      {
        title  : 'event3',
        start  : '2019-10-09T12:30:00',
        allDay : false // will make the time show
      }
    ]
  });*/
