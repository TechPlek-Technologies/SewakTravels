import { useEffect } from "react";
// import Testimonials from "../../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../../Components/Common/FooterComponent";
import ChooseUs from "../../Components/Services/OutStation/ChooseUs";
import OutstationContent from "../../Components/Services/OutStation/OutstationContent";
import Layout from "../../Layout/Layout";
import { Helmet } from "react-helmet";
import OutstationContent2 from "../../Components/Services/OutStation/OutstationContent2";
import Faq from "../../Components/Services/OutStation/Faq";

const Outstation = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Helmet>
      <title> Book Online Outstation Cabs & Taxis Service at Best Prices. </title>
        <meta
          name="description"
          content=" Now book cabs online at best price from Sewak Travels. Get all types of taxi booking services at lowest fare. Find best cabs booking deals on SUVs, Sedan and Hatchbacks.  Clean Cars, Easy to Book "
        />
        <meta
          name="keywords"
          content="outstation cab booking, taxi service in delhi for outstation, outstation cab service, one-way cab booking, book car rental online, car booking, online cab booking, taxi booking, online taxi booking, book outstation cab, cab booking, car booking, rental cab, outstation cab, airport cab, hourly cab, cab booking online"
        />
  <link rel="canonical" href="https://sewaktravels.com/outstation-cab-taxi-service" />

      </Helmet>

      <Layout title="light_header" userBgClass="user user-light" />
      <OutstationContent />
      <OutstationContent2/>
      <ChooseUs />
      <Faq/>
      {/* <Testimonials /> */}
      <FooterComponent />
    </>
  );
};

export default Outstation;
