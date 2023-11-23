// import CabOffers from "../Components/Cab/Home/CabOffers";
import CabGallery from "../Components/Cab/Home/CabGallery";
import CallService from "../Components/Cab/Home/CallService";
import FactsContent from "../Components/Cab/Home/FactsContent/FactsContent";
// import FleetCars from "../Components/Cab/Home/FleetCars";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import NewHomeBanner from "../Components/Cab/Home/NewHomeBanner";
import OurVehicleOffers from "../Components/Cab/Home/OurvehicleOffers";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import Video from "../Components/Cab/Home/VideoComponent/Video";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";
import VideoBanner from "../Components/Cab/Home/VideoBanner";
import FullBanner from "../Components/Cab/Home/FullBanner";
// import TopCategory from "../Components/Cab/Home/TopCategory";
// import CabOffers from "../Components/Cab/Home/Offers/CabOffers";

function Home() {
  return (
    <>
      <Layout title="overlay-black" />
      <NewHomeBanner />
      <OurVehicleOffers/>
      {/* <TopCategory titleClass="top-category margin-cls radius-cls" /> */}
      {/* <FleetCars /> */}
      {/* <CabOffers/> */}
      {/* <CabGallery /> */}
      <VideoBanner />
      <FactsContent />
      <Testimonials />
      <ServicesComponent />
      <Video />
      <FullBanner />
      {/* <CallService /> */}
      <CallService />
      <Instagram />
      <FooterComponent />
    </>
  );
}

export default Home;
