var chart;
$(document).ready(function()
{
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
           pointFormat: '{series.name}: <b>{point.percentage}%</b>',
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
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                }
            }
        },
        series: [
        {
            type: 'pie',
            data: [
            ['Oui',   60],
            ['Non',   40],
            ]
        }]
    });
});