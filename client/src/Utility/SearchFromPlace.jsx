import { useContext } from "react";
import { AppContext } from "../Context/JourneyContext";
import { calculateDistanceAndDuration } from "./DistanceCalculator";

const useSearchBetweenPlaces = () => {
  const { journeyData, setJourneyData } = useContext(AppContext);

  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const startDate = new Date(tomorrow);
  const returnDate = new Date(dayAfterTomorrow);

  const startTime = "12:00 PM";
  const returnTime = "12:00 PM";

  const selectedValue = "Outstation Round-Trip";

  const searchBetweenPlaces = (source, destination) => {
    calculateDistanceAndDuration(
      source,
      destination,
      selectedValue,
      journeyData,
      setJourneyData,
      startDate,
      returnDate,
      startTime,
      returnTime
    );
  };

  return searchBetweenPlaces;
};

export default useSearchBetweenPlaces;
