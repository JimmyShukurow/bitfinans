<template>
  <mgl-map
    :accessToken="accessToken"
    :mapStyle.sync="mapStyle"
    @load="onMapLoaded"
    :center="mapCoordinates"
    :zoom="7"
    :style="`height: ${mapHeight}px`"
  >
    <mgl-marker :coordinates="markerCoordinates" color="red" />
  </mgl-map>
</template>

<script>
import Mapbox from "mapbox-gl";
import { MglMap, MglMarker } from "vue-mapbox";

export default {
  name: 'vehicle-tracking',
  components: {
    'mgl-map': MglMap,
    'mgl-marker': MglMarker
  },
  data() {
    return {
      accessToken: process.env.MIX_MAPBOX_TOKEN,
      mapStyle: 'mapbox://styles/mapbox/navigation-day-v1',
      mapHeight: window.innerHeight,
      // Latest coordinates to center map according to marker
      mapCoordinates: [
        Number(window.default_lat),
        Number(window.default_lng)
      ],
      // Marker is our vehicle
      markerCoordinates: [
        Number(window.default_lat),
        Number(window.default_lng)
      ]
    };
  },

  created() {
    // We need to set mapbox-gl library here in order to use it in template
    this.mapbox = Mapbox;
  },
  methods: {
    async onMapLoaded(mapbox) {

      Echo.channel('vehicle-coordinates')
        .listen('.coordinates.updated', async (e) => {

          // Here we're moving only marker
          this.markerCoordinates = [e.lat, e.lng]

          // If you need to center map according to the marker coordinates, uncomment below
          //await mapbox.component.actions.easeTo({
          //  center: [e.lat, e.lng]
          //})

      })

    }
  }
};
</script>
