import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { GestureHandling } from "leaflet-gesture-handling";

export default function map_init() {
  const locationsElements = document.querySelectorAll(".map-section__location");
  if (!locationsElements[0]) return;

  let map = L.map("map", {
    scrollWheelZoom: false,
    gestureHandling: true,
  }).setView([50.06315712532213, 19.937200138444304], 12);

  let mapIcon = L.icon({
    iconUrl: `${adminUrl.template_directory}/dist/images/marker.svg`,
    iconSize: [32, 48],
    iconAnchor: [16, 0],
  });

  locationsElements.forEach((location) => {
    let coordintaes = location.dataset.coordinates.split(", ");
    const latt = coordintaes[0];
    const long = coordintaes[1];
    let marker = L.marker([latt, long], { icon: mapIcon }).addTo(map);
  });
  let tilesLayer = L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png",
    {
      attribution:
        "&copy; <a href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a> contributors &copy; <a href='https://carto.com/attributions'>CARTO</a>",
      subdomains: "abcd",
      maxZoom: 15,
    }
  );

  L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png",
    {
      zoomControl: false,
      maxZoom: 15,
      layers: [tilesLayer],
    }
  ).addTo(map);

  let width = window.innerWidth;

  if (width < 768) {
    map.setZoom(11);
  } else {
    map.setZoom(12);
  }

  window.addEventListener("resize", () => {
    let width = window.innerWidth;

    if (width < 768) {
      map.setZoom(11);
    } else {
      map.setZoom(12);
    }
  });
}
