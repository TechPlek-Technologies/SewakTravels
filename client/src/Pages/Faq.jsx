import { Helmet } from "react-helmet";
import FaqContent from "../Components/Cab/Faq/FaqContent";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";

const Faq = () => {
  return (
    <>
      <Helmet>
        <link rel="canonical" href="https://sewaktravels.com/FAQ" />
      </Helmet>
      <Layout title="light_header" userBgClass="user user-light" />
      <FaqContent />
      <FooterComponent />
    </>
  );
};

export default Faq;
