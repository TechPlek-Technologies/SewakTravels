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
import DelhiToDesinationMeta from "./MetaTags/DelhiToDestination";
import DelhiToDharamshala from "./DelhiToDharamshala";
import DelhiToAmbala from "./DelhiToAmbala";
import DelhiToAuli from "./DelhiToAuli";
import DelhiToBareilly from "./DelhiToBareilly";
import DelhiToHaldwani from "./DelhiToHaldwani";
import DelhiToMoradabad from "./DelhiToMoradabad";
import DelhiToVaranasi from "./DelhiToVaranasi";
import DelhiToMussoorie from "./DelhiToMussoorie";
import DelhiToBatala from "./DelhiToBatala";
import DelhiToMohali from "./DelhiToMohali";
import DelhiToDalhousie from "./DelhiToDalhousie";
import DelhiToSrinagar from "./DelhiToSrinagar";
import DelhiToJalandhar from "./DelhiToJalandhar";
import DelhiToNainital from "./DelhiToNainital";
import DelhiToUdaipur from "./DelhiToUdaipur";
import DelhiToAmritsar from "./DelhiToAmritsar";
import DelhiToKarnal from "./DelhiToKarnal";
import DelhiToJodhpur from "./DelhiToJodhpur";
import DelhiToGwalior from "./DelhiToGwalior";
import DelhiToAlwar from "./DelhiToAlwar";
import DelhiToDestination from "../Components/Cab/Listing/DelhiToDestination";
import { dataAgra, dataChandigarh, dataDehradun, dataJaipur, dataKasauli, dataKasol, dataManali, dataRishikesh, dataShimla } from "./SourceToDestination";


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

        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="CHANDIGARH, INDIA" && <div><DelhiToChandigarh/> <DelhiToDesinationMeta query={destination}/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AGRA, UTTAR PRADESH, INDIA" && <div><DelhiToAgra/> <DelhiToDesinationMeta query={destination}/></div>}
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="DEHRADUN, UTTARAKHAND, INDIA" && <div><DelhiToDehradun/> <DelhiToDesinationMeta query={destination}/></div> }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="JAIPUR, RAJASTHAN, INDIA" && <div><DelhiToJaipur/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASAULI, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasauli/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KASOL, HIMACHAL PRADESH, INDIA" && <div><DelhiToKasol/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MANALI, HIMACHAL PRADESH, INDIA" && <div><DelhiToManali/><DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="RISHIKESH, UTTARAKHAND, INDIA" && <div><DelhiToRishikesh/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="SHIMLA, HIMACHAL PRADESH, INDIA" && <div><DelhiToShimla/> <DelhiToDesinationMeta query={destination}/> </div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MCLEODGANJ, HIMACHAL PRADESH, INDIA" && <div><DelhiToMcLeodganj/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="HARIDWAR, UTTARAKHAND, INDIA" && <div><DelhiToHaridwar/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MATHURA, UTTAR PRADESH, INDIA" && <div><DelhiToMathura/><DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="VRINDAVAN, UTTAR PRADESH, INDIA" && <div><DelhiToVrindavan/><DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KULLU, HIMACHAL PRADESH, INDIA" && <div><DelhiToKullu/> <DelhiToDesinationMeta query={destination}/></div>   }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="BIJNOR, UTTAR PRADESH, INDIA" && <div><DelhiToBijnor/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AMBALA, HARYANA, INDIA" && <div><DelhiToAmbala/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AULI, UTTARAKHAND, INDIA" && <div><DelhiToAuli/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="BAREILLY, UTTAR PRADESH, INDIA" && <div><DelhiToBareilly/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="HALDWANI, UTTARAKHAND, INDIA" && <div><DelhiToHaldwani/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MORADABAD, UTTAR PRADESH, INDIA" && <div><DelhiToMoradabad/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="VARANASI, UTTAR PRADESH, INDIA" && <div><DelhiToVaranasi/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="DHARAMSHALA, HIMACHAL PRADESH, INDIA" && <div><DelhiToDharamshala/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MUSSOORIE, UTTARAKHAND, INDIA" && <div><DelhiToMussoorie/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="BATALA, PUNJAB, INDIA" && <div><DelhiToBatala/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="MOHALI, PUNJAB, INDIA" && <div><DelhiToMohali/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="DALHOUSIE, HIMACHAL PRADESH, INDIA" && <div><DelhiToDalhousie/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="SRINAGAR, JAMMU AND KASHMIR, INDIA" && <div><DelhiToSrinagar/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="JALANDHAR, PUNJAB, INDIA" && <div><DelhiToJalandhar/> <DelhiToDesinationMeta query={destination}/></div>  }  
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="NANITAL, UTTARAKHAND, INDIA" && <div><DelhiToNainital/> <DelhiToDesinationMeta query={destination}/></div>  }  
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="UDAIPUR, RAJASTHAN, INDIA" && <div><DelhiToUdaipur/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="AMRITSAR, PUNJAB, INDIA" && <div><DelhiToAmritsar/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="ALWAR, RAJASTHAN, INDIA" && <div><DelhiToAlwar/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="KARNAL, HARYANA, INDIA" && <div><DelhiToKarnal/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="JODHPUR, RAJASTHAN, INDIA" && <div><DelhiToJodhpur/> <DelhiToDesinationMeta query={destination}/></div>  }
        {source.toUpperCase()==="DELHI, INDIA" &&  destination.toUpperCase()==="GWALIOR, MADHYA PRADESH, INDIA" && <div><DelhiToGwalior/> <DelhiToDesinationMeta query={destination}/></div>  }  
        <FooterComponent/>
      </>
    )
}
 export default CabListing