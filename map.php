<head>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=KEY&callback=initMap"></script>
</head>
<style>
        #map {
            height: 500px;
            width: 100%;
        }
</style>
<script type="text/javascript">
        var map;
        function initMap() {
        // 初始化地圖
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: { lat: 25.0426, lng: 121.552 }
            });
        }
</script>
<body>
    <div id="map"></div>
</body>
