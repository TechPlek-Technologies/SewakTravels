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
import CabPopup from "../Components/Cab/Listing/CabPopup";
import RentalSection from "./CabListing/RentalSection";
import { useParams } from "react-router-dom";
import { PaymentContext } from "../Context/PaymentContext";
import { SendMail } from "../Utility/SendMail";

function CabListing1({source, destination,blogdata,selectedValue,price}) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const { journeyData, setJourneyData } = useContext(AppContext);
  const { paymentData } = useContext(PaymentContext);
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

useEffect(()=>{
  async function sendQueryEmail() {
    if (paymentData.contact) {
      const res = await SendMail(
        "booking@sewaktravels.Com",
        "Demo",
        `<h1>New Query From Search bar:</h1>
        
        <h5>Mobile Number : ${paymentData.contact}</h5>
        <h5>Source : ${journeyData.source}</h5>
        <h5>Destination : ${journeyData.destination}</h5>
        <h5>Trip Type :  One way</h5>
        <h5>Start Date : ${journeyData.startDate}</h5>
        `,
        "Booking Query"
      );
      console.log(res);
    } 

  }
  sendQueryEmail();

},[])

console.log(paymentData.contact);

  const [isValid, setisValid] = useState("notValid");

  return (
    <div style={{backgroundColor:"#fafafa"}}>
      <Layout title="light_header" />
      <ListSearch data={data} setisValid={setisValid} rentals={rentals} setRentals={setRentals}/>
      <ListingView  data={data} isValid={isValid} price={blogdata?.price}/>
      {/* <CabPopup/> */}
      {/* <CabOptions/> */}
     { blogdata? <DelhiToDestination data={blogdata} />:null}
      {/* <CabOptions1 source={source}/>
      <RentalSection destination={destination}/>
      <ServiceBlocks/> */}
      <DelhiToDesinationMeta1 query={source} query1={destination}/>
      <FooterComponent />
    </div>
  );
}
export default CabListing1;
