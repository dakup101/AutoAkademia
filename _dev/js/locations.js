import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { GestureHandling } from "leaflet-gesture-handling";

const locations = () => {
  const locations = document.querySelectorAll(".locations__location-map");

  if (!locations[0]) return;

  const pin = L.icon({
    iconUrl: `${adminUrl.template_directory}/dist/images/marker.svg`,
    iconSize: [24, 36],
    iconAnchor: [12, 0],
  });

  let maps = [];

  locations.forEach((location) => {
    const district = location.dataset.district;

    const coordinates = location.dataset.coordinates.split(", ");
    const latt = coordinates[0];
    const long = coordinates[1];

    let map = L.map(`location-${district.toLowerCase().replace(/\s/g, '')}`, {
      scrollWheelZoom: false,
      gestureHandling: true,
    }).setView([latt, long], 12);

    let marker = L.marker([latt, long], { icon: pin }).addTo(map);

    marker.bindPopup(
      `${district}`
    )

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);
  });
};

export default locations;
