// distanceCalculator.js
const calculateDistanceAndDuration = (
  pickup,
  destination,
  selectedValue,
  journeyData,
  setJourneyData,
  startDate,
  returnDate,
  startTime,
  returnTime
) => {
  try {
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

        const distanceNumeric = parseFloat(
          distance.replace(/,/g, "").replace(" Km", "")
        );

        const duration = leg.duration.text;

        const daysAndHours = duration.match(/\d+/g).map(Number);

        let totalDistance = distanceNumeric;

        const durationInHours = daysAndHours[0] * 24 + daysAndHours[1];

        let totalTime = durationInHours;

        // Calculate the duration in hours

        const updatedObject = {
          ...journeyData,
          selectedValue: selectedValue,
          travelDistance: totalDistance,
          travelTime: totalTime,
          startDate: startDate,
          returnDate: returnDate,
          startTime:startTime,
          returnTime:returnTime
        };
        setJourneyData(updatedObject);
        // console.log(totalDistance,totalTime)
      } else {
        alert("Pick Valid Source and Destination");
      }
    });
  } catch (error) {
    // Handle the error here, you can log it or display a user-friendly message
    console.error("An error occurred:", error);
    // You can also display an error message to the user, e.g., alert("An error occurred. Please try again.");
  }
};

export { calculateDistanceAndDuration };
