<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BitFinans Vehicle Tracking</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
        <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" />
        
        <script>
            // Getting defaults from cache or defaults from env
            window.default_lat = {{ $vehicle?->lat ?? (float) env('DEFAULT_LAT') }}
            window.default_lng = {{ $vehicle?->lng ?? (float) env('DEFAULT_LNG') }}
        </script>
    </head>
    <body>
        
        <div id="app">
            <vehicle-tracking></vehicle-tracking>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
