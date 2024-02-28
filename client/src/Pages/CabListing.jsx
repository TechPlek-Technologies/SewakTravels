import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import DelhiToAgra from "./DelhiToAgra";
import DelhiToJaipur from "./DelhiToJaipur";
import DelhiToChandigarh from "./DelhiToChandigarh";
import DelhiToDehradun from "./DelhiToDehradun";
import DelhiToKasauli from "./DelhiToKasauli";
import DelhiToKasol from "./DelhiToKasol";
import DelhiToManali from "./DelhiToManali";
import DelhiToRishikesh from "./DelhiToRishikesh";
import DelhiToShimla from "./DelhiToShimla";
import DelhiToMcLeodganj from "./DelhiToMcLeodganj ";
import DelhiToHaridwar from "./DelhiToHaridwar";
import DelhiToMathura from "./DelhiToMathura";
import DelhiToVrindavan from "./DelhiToVrindavan";
import DelhiToKullu from "./DelhiToKullu";
import DelhiToBijnor from "./DelhiToBijnor";


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

        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="CHANDIGARH, INDIA" && <div><DelhiToChandigarh/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AGRA, UTTAR PRADESH, INDIA" && <div><DelhiToAgra/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="DEHRADUN, UTTARAKHAND, INDIA" && <div><DelhiToDehradun/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="JAIPUR, RAJASTHAN, INDIA" && <div><DelhiToJaipur/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASAULI, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasauli/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASOL, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasol/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MANALI, HIMACHAL PRADESH, INDIA" && <div><DelhiToManali/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="RISHIKESH, UTTARAKHAND, INDIA" && <div><DelhiToRishikesh/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="SHIMLA, HIMACHAL PRADESH, INDIA" && <div><DelhiToShimla/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MCLEODGANJ, HIMACHAL PRADESH, INDIA" && <div><DelhiToMcLeodganj/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="HARIDWAR, UTTARAKHAND, INDIA" && <div><DelhiToHaridwar/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MATHURA, UTTAR PRADESH, INDIA" && <div><DelhiToMathura/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="VRINDAVAN, UTTAR PRADESH, INDIA" && <div><DelhiToVrindavan/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KULLU, HIMACHAL PRADESH, INDIA" && <div><DelhiToKullu/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="BIJNOR, UTTAR PRADESH, INDIA" && <div><DelhiToBijnor/></div> }
        
        <FooterComponent/>
      </>
    )
}
 export default CabListing