import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";


function CabListing(){
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);

  const [isValid,setisValid]=useState("notValid");
 

  const {source,destination}=useParams();

  console.log(source,destination);
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch setisValid={setisValid}/>
        <ListingView isValid={isValid}/>

        {source.toUpperCase()=="DELHI, INDIA" &&  destination.toUpperCase()==="CHANDIGARH, INDIA" && <div>CHANDIGARH</div> }
        {source.toUpperCase()=="DELHI, INDIA" &&  destination.toUpperCase()==="AGRA, UTTAR PRADESH, INDIA" && <div>AGRA</div> }
        {source.toUpperCase()=="DELHI, INDIA" &&  destination.toUpperCase()==="DEHRADUN, UTTARAKHAND, INDIA" && <div>DEHRADUN</div> }
        {source.toUpperCase()=="DELHI, INDIA" &&  destination.toUpperCase()==="JAIPUR, RAJASTHAN, INDIA" && <div>JAIPUR</div> }
        
        <FooterComponent/>
      </>
    )
}
 export default CabListing