// import Breadcrumb from "../Components/Common/Breadcrumb";
import { useEffect } from "react";
import FooterComponent from "../Components/Common/FooterComponent";
import ContactusContent from "../Components/Contactus/ContactUsContent";
import Layout from "../Layout/Layout";
import { Helmet } from "react-helmet";

const Contactus = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Helmet>
        <link rel="canonical" href="https://www.sewaktravels.com/contact" />
      </Helmet>
      <Layout title="light_header" userBgClass="user user-light" />
      {/* <Breadcrumb
        title={"home"}
        subTitle={"about us"}
        bannerImg={"/assets/images/inner-bg.jpg"}
      /> */}

      <ContactusContent />
      <FooterComponent />
    </>
  );
};

export default Contactus;
