import ListingView from "../Components/Cab/Listing/ListingView";
import Layout from "../Layout/Layout";
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../Context/JourneyContext";
import OurAirportMeta from "./MetaTags/OurAirportMeta";
import AirportCab from "../Components/Cab/Listing/AirportCab";


function CabListing5({source, destination,blogdata,selectedValue}) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const { journeyData, setJourneyData } = useContext(AppContext);
  const [rentals, setRentals] = useState("4hrs40km");
  const data = {
    source:source,
    destination: destination,
    startDate: tomorrow,
    returnDate: dayAfterTomorrow,
    rentals: rentals,
    selectedValue: selectedValue,
    startTime: "12:00 PM",
    returnTime: "12:00 PM",
  };

  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
 

  const [isValid, setisValid] = useState("notValid");

  return (
    <>
      <Layout title="light_header" />
      <ListSearch data={data} setisValid={setisValid} rentals={rentals} setRentals={setRentals}/>
      <ListingView  data={data} isValid={isValid} />
      {blogdata ? <AirportCab data={blogdata} /> : null}
      <OurAirportMeta query={source}/>
      <FooterComponent />
    </>
  );
}
export default CabListing5;
