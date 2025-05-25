@extends('layouts.admin')

@section('content')
    <h1>Kontrolna tabla</h1>
    <p>Dobrodošli u administracioni panel pekare!</p>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart', 'piechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var recipeData = new google.visualization.DataTable();
            recipeData.addColumn('string', 'Po receptu');
            recipeData.addColumn('number', 'Broj logova');

            recipeData.addRows([
                @foreach ($logs_by_recipe as $row)
                    ['{{ $row['naziv_recepta'] }}', {{ $row['total_logs'] }}],

                @endforeach
                ]);

            var recipeOptions = {
                title: 'Distribucija logova prema po_receptu',
                is3D: true,
                slices: {
                    0: { offset: 0.1 },
                    1: { offset: 0.1 },
                },
                legend: { position: 'top' }
            };

            var recipeChart = new google.visualization.PieChart(document.getElementById('recipe_chart'));
            recipeChart.draw(recipeData, recipeOptions);
        }
    </script>

    <div id="recipe_chart" style="width: 900px; height: 500px;"></div>
@endsection