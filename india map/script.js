// script.js

// Initialize world map
var worldMap = L.map('world-map').setView([0, 0], 2);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(worldMap);

// Initialize India map
var indiaMap = L.map('india-map').setView([20.5937, 78.9629], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(indiaMap);

// Add markers or other layers to the maps as needed
// Example: Adding a marker to the world map
L.marker([51.505, -0.09]).addTo(worldMap)
    .bindPopup('London, UK')
    .openPopup();

// Example: Adding a marker to the India map
L.marker([20.5937, 78.9629]).addTo(indiaMap)
    .bindPopup('India')
    .openPopup();
