import { useEffect } from "react";
import FooterComponent from "../../Components/Common/FooterComponent";
import AirportContent from "../../Components/Services/Airport/AirportContent";
import ChooseUs from "../../Components/Services/Airport/ChooseUs";
import Layout from "../../Layout/Layout";
import { Helmet } from "react-helmet";
import AirportContent1 from "../../Components/Services/Airport/AirportContent1";
import AirportService from "../../Components/Services/Airport/AirportService";
import Faq from "../../Components/Services/Airport/Faq";
// import Testimonial from "../../Components/Services/Airport/Testimonial";

const Airport = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Helmet>
      <title> Affordable Airport Transfers | Book Airports Cabs/Taxi Online. </title>
        <meta
          name="description"
          content=" Airport Transfer service |Airports Taxi Transfers. Book airport cabs services at lowest price and make your Journey safe & hassle free experience, Choose a reliable Airport transportation service at Sewak Travels."
        />
        <meta
          name="keywords"
          content="Airport transfer, airport taxi, airport cab, airport taxi booking, airport taxi service, airport cab service, airport cab booking, cabs from airport, taxi from airport"
        />
    <link rel="canonical" href="https://sewaktravels.com/airport-cab-taxi-transport-service" />


      </Helmet>

      <Layout title="light_header" userBgClass="user user-light" />
      <AirportContent />
      <AirportContent1/>
      <AirportService/>
      <ChooseUs />
      <Faq/>
      {/* <Testimonial/> */}
      <FooterComponent />
    </>
  );
};

export default Airport;
