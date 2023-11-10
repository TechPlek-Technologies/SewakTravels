// import CabOffers from "../Components/Cab/Home/CabOffers";
import CabOffers2 from "../Components/Cab/Home/CabOffers2";
import CallService from "../Components/Cab/Home/CallService";
import FactsContent from "../Components/Cab/Home/FactsContent/FactsContent";
import FleetCars from "../Components/Cab/Home/FleetCars";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import HomeBanner from "../Components/Cab/Home/HomeBanner";
// import OurVehicleComponent from "../Components/Cab/Home/OurvehicleComponent";
// import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import Video from "../Components/Cab/Home/VideoComponent/Video";
import FooterComponent from "../Components/Common/FooterComponent";
import Navbar from "../Components/Common/Navbar";
import Layout from "../Layout/Layout";

function Home() {
  return (
    <>
      <Layout title="overlay-black"/>
      <HomeBanner /> 
      <CabOffers2/>
      <FactsContent/>
      <Testimonials/>
      <Video/>
      <FleetCars/>
      {/* <ServicesComponent/> */}
      {/* <OurVehicleComponent/> */}
      <CallService/>
      <Instagram/>
      <FooterComponent/>
    </>
  );
}

export default Home;
