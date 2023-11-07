// import Breadcrumb from "../Components/Common/Breadcrumb";
import FooterComponent from "../Components/Common/FooterComponent";
import ContactusContent from "../Components/Contactus/ContactUsContent";
import Layout from "../Layout/Layout";

const Contactus = () => {
  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      {/* <Breadcrumb
        title={"home"}
        subTitle={"about us"}
        bannerImg={"/assets/images/inner-bg.jpg"}
      /> */}

      <ContactusContent />
      <FooterComponent/>
    </>
  );
};

export default Contactus;
