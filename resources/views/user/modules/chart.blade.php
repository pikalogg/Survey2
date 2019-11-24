<p>{{$question->content}}</p>

<div style="width: 400px; height: 260px; margin: 0 auto">
        <canvas id="{{$idcanvas}}" width="400" height="260"></canvas>

</div>

<script>
    var oilCanvas = document.getElementById('{{$idcanvas}}');


    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var oilabels = [];
    var oidata = [];

    @foreach($question->responseChoices as $choice)
        oilabels.unshift("{{$choice->content}}");
        oidata.unshift({{$choice->count}});
    @endforeach


    var count = 0;

    var oilDatas = {
        labels: oilabels,
        datasets: [{
            label: '',
            data: oidata,
            backgroundColor: ["#FF6384", "#63FF84", "#84FF63", "#8463FF", "#6384FF"]
        }]
        
    };

    var chart = new Chart(oilCanvas, {
        type: "{{$type}}",
        data: oilDatas
    });
</script>