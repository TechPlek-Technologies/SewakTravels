import CabOffers from "../Components/Cab/Home/CabOffers";
import CallService from "../Components/Cab/Home/CallService";
import HomeBanner from "../Components/Cab/Home/HomeBanner";
import OurVehicleComponent from "../Components/Cab/Home/OurvehicleComponent";
import FooterComponent from "../Components/Common/FooterComponent";
import Navbar from "../Components/Common/Navbar";

function Home() {
  return (
    <>
      <header>
        <Navbar />
      </header>
      <HomeBanner />
      <CallService/>
      <CabOffers/>
      <OurVehicleComponent/>
      <FooterComponent/>
    </>
  );
}

export default Home;
