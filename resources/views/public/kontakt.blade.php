@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kontakt</h1>
    <p>Posetite nas na lokaciji ispod:</p>

    <div id="map" style="height: 400px; width: 100%;"></div>
</div>
@endsection

@section('scripts')
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
</script>

<script>
    function initMap() {
        const lokacija = { lat: 44.815312029525266, lng: 20.45978063988799 }; // Primer: Beograd, Zemun

        const mapa = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: lokacija,
        });

        const marker = new google.maps.Marker({
            position: lokacija,
            map: mapa,
            title: "Pekara",
        });
    }
</script>
@endsection
