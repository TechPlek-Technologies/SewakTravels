import ListingView from "../Components/Cab/Listing/ListingView";
import Layout from "../Layout/Layout";
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useContext, useEffect, useState } from "react";
import DelhiToDesinationMeta from "./MetaTags/DelhiToDestination";
import { AppContext } from "../Context/JourneyContext";
import { calculateDistanceAndDuration } from "../Utility/DistanceCalculator";
import DelhiToDestination from "../Components/Cab/Listing/DelhiToDestination";
import CabOptions from "./CabListing/CabOptions";

function CabListing1({ destination,blogdata }) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const { journeyData, setJourneyData } = useContext(AppContext);
  const data = {
    source: "Delhi, India",
    destination: destination,
    startDate: tomorrow,
    returnDate: dayAfterTomorrow,
    rentals: "4hrs 40km",
    selectedValue: "Outstation One-Way",
    startTime: "12:00 PM",
    returnTime: "12:00 PM",
  };
  useEffect(() => {
    // Scroll to the top of the page when the component mounts

    calculateDistanceAndDuration(
      data.source,
      data.destination,
      data.selectedValue,
      journeyData,
      setJourneyData,
      data.startDate,
      data.returnDate,
      data.startTime,
      data.returnTime,
      data.rentals
    );

    
  }, []);

  const [isValid, setisValid] = useState("notValid");

  return (
    <>
      <Layout title="light_header" />
      <ListSearch setisValid={setisValid} />
      <ListingView isValid={isValid} />
      {/* <CabOptions/> */}
      <DelhiToDestination data={blogdata} />
      <DelhiToDesinationMeta query={destination} />
      <FooterComponent />
    </>
  );
}
export default CabListing1;
