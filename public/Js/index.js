// let data = JSON.parse($('[name="data"]').val());
// showChart(data);
let uri = 'Core/helpers/getChartData.php';
ajaxCall('ASC', uri);

$('#asc').on('click', () => {
    
    ajaxCall('ASC', uri);
  })  
$('#desc').on('click', () => {
    ajaxCall('DESC', uri);
  })

  function ajaxCall(sort, uri){
    axios.get(uri,  { params: {sortBy: sort}})
    .then(function(response) {
        console.log()
         showChart(response.data);
      })
    .catch(function (error) {
      console.log(error);
    });
  }


function showChart(data){
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: data['purchase_date'],
            datasets: [{ 
                data: data['shipping'],
                label: "Shipping",
                borderColor: "#3e95cd",
                fill: false
            }, { 
                data: data['tax'],
                label: "Tax",
                borderColor: "#8e5ea2",
                fill: false
            }, { 
                data: data['grand_total'],
                label: "Total Sales",
                borderColor: "#3cba9f",
                fill: false
                }
            ]
        },
        options: {
            legend:{labels: {fontColor: 'white'}},
            title:{
            display: true,
            text: ' '
            },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontColor: 'white'
                        },
                    }],
                xAxes: [{
                        ticks: {
                            fontColor: 'white'
                        },
                    }]
                } 
        }
        });
}
            $(document).ready(function() {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function() {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
