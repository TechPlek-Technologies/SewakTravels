// import CabOffers from "../Components/Cab/Home/CabOffers";
import CallService from "../Components/Cab/Home/CallService";
import FactsContent from "../Components/Cab/Home/FactsContent/FactsContent";
// import FleetCars from "../Components/Cab/Home/FleetCars";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import NewHomeBanner from "../Components/Cab/Home/NewHomeBanner";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import Video from "../Components/Cab/Home/VideoComponent/Video";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";
import VideoBanner from "../Components/Cab/Home/VideoBanner";
import FullBanner from "../Components/Cab/Home/FullBanner";
import Package from "../Components/Cab/Home/Offers/Package";
import { useState } from "react";
import { useCallback } from "react";
import ExplorePackages from "../Components/TourPackage/ExplorePackages";
import Airline from "../Components/FlightPackage/Airline";
import ImportantLinks from "../Components/Common/ImportantLinks";
import OfferComponent from "../Components/HotelPackage/OfferComponent";
// import TopCategory from "../Components/Cab/Home/TopCategory";
// import CabOffers from "../Components/Cab/Home/Offers/CabOffers";

function Home() {

  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback((tab) => {
    setActiveTab(tab);
  }, []);
  
  return (
    <>
      <Layout title="overlay-black" />
      <NewHomeBanner activeTab={activeTab} callback={callback} />
      {/* <OurVehicleOffers/> */}
      {/* <TopCategory titleClass="top-category margin-cls radius-cls" /> */}
      {/* <FleetCars /> */}
      {/* <CabOffers/> */}
      {/* <CabGallery /> */}
      {activeTab==="1"&& <Package type="Cab Offers"/>}
      {activeTab==="2"&& <Airline type="Flight Offers"/>}
      {activeTab==="3"&& <OfferComponent type="Hotel Offers"/>}
      {activeTab==="4"&& <ExplorePackages type="Tour Offers"/>}
      {activeTab==="4"&&<ImportantLinks/>}
      {activeTab==="1"&& <VideoBanner />}
      {<FactsContent />}
      { <Testimonials />}
      {activeTab==="1"&& <FullBanner />}
      {<ServicesComponent />}
      {<Video />}
      {<CallService />}
      {/* <Instagram /> */}
      {<FooterComponent />}
    </>
  );
}

export default Home;
