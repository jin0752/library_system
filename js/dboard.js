const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=> {
    item.style.setProperty('--value', item.dataset.value)
})

const allMenu = document.querySelectorAll('main .content-data .head .menu');
allMenu.forEach(item=> {
    const icon =item.querySelector('.icon');
    const menuLink = item.querySelector('.menu-link');

    icon.addEventListener('click', function(){
        menuLink.classList.toggle('show');
    })
})




var options = {
    series: [{
    name: 'Number of Students',
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 70, 71, 75]
  }, {
    name: 'Number of Books',
    data: [76, 85, 100, 98, 87, 100, 91, 114, 94, 90, 85, 87]
  }, {
    name: 'Working Computers',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41, 45, 48, 50]
  }],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
  },
  yaxis: {
    title: {
      text: 'Report'
    }
  },
  fill: {
    opacity: 1
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return "# " + val + " count"
      }
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();