import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useEffect } from "react";


function CabListing(){
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
 
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch/>
        <ListingView/>
        <FooterComponent/>
      </>
    )
}
 export default CabListing