var scores = JSON.parse(document.getElementById("obj-scores").innerHTML);

Charts.init()

var options = {
    barRoundness: 1.2,
    scales: {
        yAxes: [{
            ticks: {
            callback: function(a) {
                if (!(a % 20))
                return a + " คะแนน"
            }
            }
        }]
    },
    tooltips: {
        callbacks: {
            label: function(a, e) {
            var t = e.datasets[a.datasetIndex].label || "",
                o = a.yLabel,
                r = "";
            return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">&nbsp;'+ o + " คะแนน</span>"
            }
        }
    }
}

var dataTem = {
    labels: ["รอบที่ 1", "รอบที่ 2", "รอบที่ 3", "รอบที่ 4", "รอบที่ 5", "รอบที่ 6"],
    datasets: [{
    label: "Sales",
    data: [8, 9, 7, 4, 10, 6]
    }]
}

var dataScore = {
    labels: [],
    datasets: [{
    label: "Score",
    data: [],
    }]
}

var count = 0;
scores.forEach(async element => {
    if (element.score != null){
        count++;
        await dataScore.datasets[0].data.push(element.score);
    }
});

for (let i = 1; i <= count; i++) {
    dataScore.labels.push("รอบที่ " + i);
}

dataScore.datasets[0].data.push(100);

Charts.create('#ordersChart', 'roundedBar', options, dataScore)