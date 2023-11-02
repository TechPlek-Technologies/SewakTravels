// distanceCalculator.js
const calculateDistanceAndDuration = (pickup, destination, pickupDate, selectedValue, journeyData, setJourneyData) => {
    const directionsService = new window.google.maps.DirectionsService();
    const request = {
      origin: pickup,
      destination: destination,
      travelMode: window.google.maps.TravelMode.DRIVING,
    };
  
    directionsService.route(request, (response, status) => {
      if (status === "OK") {
        const route = response.routes[0];
        const leg = route.legs[0];
        const distance = leg.distance.text;

        const distanceNumeric = parseFloat(distance.replace(/,/g, '').replace(' Km', ''));

        
        const duration = leg.duration.text;
  
        const daysAndHours = duration.match(/\d+/g).map(Number);
  
        // Calculate the duration in hours
        const durationInHours = daysAndHours[0] * 24 + daysAndHours[1];
          console.log(durationInHours)
        const updatedObject = {
          ...journeyData,
          pickup: pickup,
          dropoff: destination,
          pickupDate: pickupDate,
          tripType: selectedValue,
          distance: distanceNumeric,
          time: durationInHours,
        };
        setJourneyData(updatedObject);
      } else {
        console.log("Error");
      }
    });
  };
  
  export { calculateDistanceAndDuration };
  