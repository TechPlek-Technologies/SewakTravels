import { useEffect } from "react";
import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import { carData } from "../Data/CabData";
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useContext } from "react";
import { AppContext } from "../Context/JourneyContext";
function CabListing(){

  const context= useContext(AppContext);
  const {journeyData}=context;

  console.log(journeyData);
 
const data=carData;
  useEffect(() => {
    document.documentElement.style.setProperty("--theme-color1", "233, 179, 14");
    document.documentElement.style.setProperty("--theme-color2", "239, 63, 62");

    return () => {
      document.documentElement.style.setProperty("--theme-color1","239, 63, 62");
      document.documentElement.style.setProperty("--theme-color2","0, 162, 247");
    };
  }, []);
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch/>
        <ListingView data={data}/>
        <FooterComponent/>
      </>
    )
}
 export default CabListing