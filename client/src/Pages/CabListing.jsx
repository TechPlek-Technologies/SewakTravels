import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { SendMail } from "../Utility/SendMail";

function CabListing(){
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  const [rentals, setRentals] = useState("4hrs40km");
  const [isValid,setisValid]=useState("notValid");

  
  const params=useParams();
  const paramData = params.params ? JSON.parse(params.params) : null;
  console.log("paramData",paramData);


useEffect(()=>{
  async function sendQueryEmail() {
    if (paramData.email_phone) {
      const res = await SendMail(
        "booking@sewaktravels.Com",
        "Demo",
        `<h1>New Query From Search bar:</h1>
        
        <h5>Mobile Number : ${paramData.email_phone}</h5>
        <h5>Source : ${paramData.source}</h5>
        <h5>Destination : ${paramData.destination}</h5>
        <h5>Trip Type :  One way</h5>
        <h5>Start Date : ${paramData.startDate}</h5>
        `,
        "Booking Query"
      );
      console.log(res);
    } 

  }
  sendQueryEmail();

},[])
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch setisValid={setisValid} rentals={rentals} setRentals={setRentals}/>
        <ListingView rentals={rentals} isValid={isValid}/>
        <FooterComponent/>
      </>
    )
}
 export default CabListing