import { useEffect } from "react";
import Testimonials from "../../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../../Components/Common/FooterComponent";
import ChooseUs from "../../Components/Services/Corporate/ChooseUs";
import CompanyForm from "../../Components/Services/Corporate/CompanyForm";
import CorporateContent from "../../Components/Services/Corporate/CorporateContent";
import Layout from "../../Layout/Layout";
import { Helmet } from "react-helmet";

const Corporate = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Helmet>
        <title> Employee Transportation Services | Staff Transportation </title>
        <meta
          name="description"
          content=" Sewak Travels stands as a prominent provider of Employee Transportation Services in India, presenting Staff Transportation Solutions. Our commitment lies in facilitating seamless commutes for your workforce."
        />
        <meta
          name="keywords"
          content=" Employee Transportation, Employee Transportation Services, Employee Transportation Company, Staff Transportation, Staff Transportation Services, Staff Transportation Company, Employee Transportation Solutions, Corporate Employee Transport, Corporate Transportation, Employee Transportation System, employee transportation services in Gurgaon"
        />
      </Helmet>

      <Layout title="light_header" userBgClass="user user-light" />
      <CorporateContent />
      <ChooseUs />
      <CompanyForm />
      <Testimonials />
      <FooterComponent />
    </>
  );
};

export default Corporate;
