import CabOffers from "../Components/Cab/Home/CabOffers";
import CallService from "../Components/Cab/Home/CallService";
import FleetCars from "../Components/Cab/Home/FleetCars";
import HomeBanner from "../Components/Cab/Home/HomeBanner";
import OurVehicleComponent from "../Components/Cab/Home/OurvehicleComponent";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../Components/Common/FooterComponent";
import Navbar from "../Components/Common/Navbar";

function Home() {
  return (
    <>
      <header>
        <Navbar />
      </header>
      <HomeBanner /> 
      <OurVehicleComponent/>
      {/* <CabOffers/> */}
      <Testimonials/>
      <CallService/>
      <FleetCars/>
      <ServicesComponent/>
      <FooterComponent/>
    </>
  );
}

export default Home;
