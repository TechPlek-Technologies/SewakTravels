import FaqContent from "../Components/Cab/Faq/FaqContent";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";

const Faq = () => {
  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      <FaqContent />
      <FooterComponent/>
    </>
  );
};

export default Faq;
