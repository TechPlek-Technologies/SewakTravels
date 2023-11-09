import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";


function CabListing(){

 
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch />
        <ListingView/>
        <FooterComponent/>
      </>
    )
}
 export default CabListing