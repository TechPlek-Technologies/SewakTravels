import { useEffect } from "react";
import Testimonials from "../../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../../Components/Common/FooterComponent";
import ChooseUs from "../../Components/Services/Corporate/ChooseUs";
import CompanyForm from "../../Components/Services/Corporate/CompanyForm";
import CorporateContent from "../../Components/Services/Corporate/CorporateContent";
import Layout from "../../Layout/Layout";

const Corporate=()=>{
    useEffect(() => {
        // Scroll to the top of the page when the component mounts
        window.scrollTo(0, 0);
      }, []);
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <CorporateContent/>
        <ChooseUs/>
        <CompanyForm/>
        <Testimonials/>
        <FooterComponent/>
        </>
    )
}

export default Corporate;