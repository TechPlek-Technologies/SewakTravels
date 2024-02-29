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
import DelhiToAgraMeta from "./MetaTags/DelhiToAgraMeta";
import DelhiToChandigarhMeta from "./MetaTags/DelhiToChandigarhMeta";
import DelhiToDehradunMeta from "./MetaTags/DelhiToDehradunMeta";
import DelhiToJaipurMeta from "./MetaTags/DelhiToJaipurMeta";
import DelhiToKasauliMeta from "./MetaTags/DelhiToKasauliMeta";
import DelhiToKasolMeta from "./MetaTags/DelhiToKasolMeta";
import DelhiToManaliMeta from "./MetaTags/DelhiToManaliMeta";
import DelhiToRishikeshMeta from "./MetaTags/DelhiToRishikeshMeta";
import DelhiToShimlaMeta from "./MetaTags/DelhiToShimlaMeta";
import DelhiToMcLeodganjMeta from "./MetaTags/DelhiToMcLeodganjMeta";
import DelhiToHaridwarMeta from "./MetaTags/DelhiToHaridwarMeta";
import DelhiToMathuraMeta from "./MetaTags/DelhiToMathuraMeta";
import DelhiToVrindavanMeta from "./MetaTags/DelhiToVrindavanMeta";
import DelhiToKulluMeta from "./MetaTags/DelhiToKulluMeta";
import DelhiToBijnorMeta from "./MetaTags/DelhiToBijnorMeta";
import DelhiToDesinationMeta from "./MetaTags/DelhiToDestination";


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

        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="CHANDIGARH, INDIA" && <div><DelhiToChandigarh/> <DelhiToChandigarhMeta/> </div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AGRA, UTTAR PRADESH, INDIA" && <div><DelhiToAgra/> <DelhiToDesinationMeta query={destination}/></div>}
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="DEHRADUN, UTTARAKHAND, INDIA" && <div><DelhiToDehradun/> <DelhiToDehradunMeta/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="JAIPUR, RAJASTHAN, INDIA" && <div><DelhiToJaipur/> <DelhiToJaipurMeta/> </div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASAULI, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasauli/> <DelhiToKasauliMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASOL, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasol/> <DelhiToKasolMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MANALI, HIMACHAL PRADESH, INDIA" && <div><DelhiToManali/> <DelhiToManaliMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="RISHIKESH, UTTARAKHAND, INDIA" && <div><DelhiToRishikesh/> <DelhiToRishikeshMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="SHIMLA, HIMACHAL PRADESH, INDIA" && <div><DelhiToShimla/> <DelhiToShimlaMeta/> </div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MCLEODGANJ, HIMACHAL PRADESH, INDIA" && <div><DelhiToMcLeodganj/> <DelhiToMcLeodganjMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="HARIDWAR, UTTARAKHAND, INDIA" && <div><DelhiToHaridwar/> <DelhiToHaridwarMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MATHURA, UTTAR PRADESH, INDIA" && <div><DelhiToMathura/> <DelhiToMathuraMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="VRINDAVAN, UTTAR PRADESH, INDIA" && <div><DelhiToVrindavan/> <DelhiToVrindavanMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KULLU, HIMACHAL PRADESH, INDIA" && <div><DelhiToKullu/> <DelhiToKulluMeta/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="BIJNOR, UTTAR PRADESH, INDIA" && <div><DelhiToBijnor/> <DelhiToBijnorMeta/></div>  }
        
        <FooterComponent/>
      </>
    )
}
 export default CabListing