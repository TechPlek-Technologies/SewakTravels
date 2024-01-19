import { useEffect } from "react";
import ChooseUs from "../../Components/Cab/Service/ChooseUs";
import ServiceComponent from "../../Components/Cab/Service/ServiceComponent";
import FooterComponent from "../../Components/Common/FooterComponent";
import Layout from "../../Layout/Layout";
import { Helmet } from "react-helmet";

const Service = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      <Helmet>
        <title>
          Sewak Travels -Outstation, Employee, and Airport Cab Services
        </title>
        <meta
          name="description"
          content="Experience the strength of our services – your top choice for reliable outstation travel, efficient employee transportation, and seamless airport cab services."
        />
        <meta
          name="keywords"
          content=" Outstation cab service, Employee transportation, Airport  
         Cab Services "
        />
  <link rel="canonical" href="https://sewaktravels.com/service" />

      </Helmet>

      <ServiceComponent />
      <ChooseUs />
      <FooterComponent />
    </>
  );
};

export default Service;
