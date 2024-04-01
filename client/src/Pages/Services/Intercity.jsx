import { useEffect } from "react";
import FooterComponent from "../../Components/Common/FooterComponent";
import ChooseUs from "../../Components/Services/Intercity/ChooseUs";
import Layout from "../../Layout/Layout";
import { Helmet } from "react-helmet";
import IntercityContent from "../../Components/Services/Intercity/IntercityContent";
import IntercityContent2 from "../../Components/Services/Intercity/IntercityContent2";
import IntercityService from "../../Components/Services/Intercity/IntercityService";
import Faq from "../../Components/Services/Intercity/Faq";
// import Testimonial from "../../Components/Services/Intercity/Testimonial";

const Intercity = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
    <Helmet>
        <title>Reliable & Affordable Intercity Taxi Service | Intercity Cab </title>
        <meta name="description" content=" Safe & dependable intercity cabs at the best rates. Arrive at your destination relaxed & on time. Choose Sewak Travels reliable intercity taxi service for a smooth & comfortable ride. Book your intercity taxi online in minutes! Save time & money with our transparent pricing."/>
        <meta name="keywords" content="nearest taxi service, online taxi service, intercity cab services, intercity taxi service, intercity ride, intercity cab, intercity cabs, taxi travels near me, oneway cab booking, intercity cab service Gurgaon, intercity suv company, intercity suv companies, cab for intercity travel, inter city taxi, intercity cab booking, intercity suv travel"/>
    </Helmet>


      <Layout title="light_header" userBgClass="user user-light" />
      <IntercityContent />
      <IntercityContent2 />
      <IntercityService />
      <ChooseUs />
      <Faq/>
      {/* <Testimonial/> */}
      <FooterComponent />
    </>
  );
};

export default Intercity;
