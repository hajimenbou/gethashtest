const geofire = require('geofire-common');
const positionText = require('./position.json');

for (const key in positionText) {
    let position = positionText[key];
    let geohash = geofire.geohashForLocation([position.lat, position.lng]);
    console.log(`"${position.town}${position.koaza}",${position.lat},${position.lng},${geohash}`);
}