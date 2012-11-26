var chart;
var chart2
$(document).ready(function()
{
    var oui = parseInt($('#oui').text());
    var non = parseInt($('#non').text());
    // var note_0 = parseInt($('#note_0').text());
    // var note_1 = parseInt($('#note_1').text());
    // var note_2 = parseInt($('#note_2').text());
    // var note_3 = parseInt($('#note_3').text());
    // var note_4 = parseInt($('#note_4').text());
    // var note_5 = parseInt($('#note_5').text());
    // var note_6 = parseInt($('#note_6').text());
    // var note_7 = parseInt($('#note_7').text());
    // var note_8 = parseInt($('#note_8').text());
    // var note_9 = parseInt($('#note_9').text());
    // var note_10 = parseInt($('#note_10').text());

    chart = new Highcharts.Chart(
    {
        chart:
        {
            renderTo: 'chart_oui_non',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        credits: {enabled: false},
        title:
        {
            text: null
        },
        tooltip:
        {
           pointFormat: '<b>{point.percentage}%</b>',
           percentageDecimals: 1
       },
       plotOptions:
       {
            pie:
            {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels:
                {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function()
                    {
                        return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*10)/10 +' %';
                    }
                }
            }
        },
        series: [
        {
            type: 'pie',
            data: [
            ['Oui',   oui],
            ['Non',   non],
            ]
        }]
    });   
});

  