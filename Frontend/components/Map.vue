<template>
  <GMap
    ref="gMap"
    :cluster="{ options: { styles: clusterStyle } }"
    :center="{ lat: locations[0].lat, lng: locations[0].lng }"
    :options="mapOptions"
    :zoom="10"
  >
    <GMapMarker
      v-for="location in locations"
      :key="location.id"
      :position="{ lat: location.lat, lng: location.lng }"
      :options="{
        icon: location === currentLocation ? pins.selected : pins.notSelected
      }"
      @click="currentLocation = location"
    >
      <GMapInfoWindow>
        <code> lat: {{ location.lat }}, lng: {{ location.lng }} </code>
      </GMapInfoWindow>
    </GMapMarker>
  </GMap>
</template>

<script>
  import mapsConf from "../configs/maps"
  
export default {
  name: "Map",
  data: () => ({
    currentLocation: {},
    locationsVisibleOnMap: "",
    locations: [
      { lat: 46.992979, lng: 6.931933 },
    ],
    pins: mapsConf.pins,
    clusterStyle: mapsConf.clusterStyle,
    mapStyle: mapsConf.mapStyle
  }),
  computed: {
    mapOptions() {
      const options = mapsConf.options;
      options['styles'] = this.mapStyle;
      return options;
    },
  },
};
</script>

<style lang="scss" scoped>
  //.GMap__Wrapper {
  //  width: 100%;
  //  height: 900px;
  //}
</style>
