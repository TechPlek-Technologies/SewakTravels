import ListingView from "../Components/Cab/Listing/ListingView";
import Layout from "../Layout/Layout";
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../Context/JourneyContext";
import { calculateDistanceAndDuration } from "../Utility/DistanceCalculator";
import DelhiToDestination from "../Components/Cab/Listing/DelhiToDestination";
import CabOptions from "./CabListing/CabOptions";
import CabOptions1 from "./CabListing/CabOptions1";
import ServiceBlocks from "./ServiceBlocks/ServiceBlocks";
import DelhiToDesinationMeta1 from "./MetaTags/DelhiToDestination1";

function CabListing1({source, destination,blogdata,selectedValue }) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const { journeyData, setJourneyData } = useContext(AppContext);
  const data = {
    source:source,
    destination: destination,
    startDate: tomorrow,
    returnDate: dayAfterTomorrow,
    rentals: "4hrs 40km",
    selectedValue: selectedValue,
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

    window.scrollTo(0, 0);

  }, []);

  const [isValid, setisValid] = useState("notValid");

  return (
    <>
      <Layout title="light_header" />
      <ListSearch setisValid={setisValid} />
      <ListingView isValid={isValid} />
      {/* <CabOptions/> */}
     { blogdata? <DelhiToDestination data={blogdata} />:null}
      {/* <CabOptions1/> */}
      {/* <ServiceBlocks/> */}
      <DelhiToDesinationMeta1 query={destination} query1={source}/>
      <FooterComponent />
    </>
  );
}
export default CabListing1;
