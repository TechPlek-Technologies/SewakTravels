import ListingBanner from "../Components/Cab/ListingBanner"
import ListingView from "../Components/Cab/ListingView"
import Layout from "../Layout/Layout"

function CabListing(){
    return(
        <>
        <Layout title="light_header"/>
        <ListingBanner title={"cab search"}/>
        <ListingView/>
      </>
    )
}
 export default CabListing