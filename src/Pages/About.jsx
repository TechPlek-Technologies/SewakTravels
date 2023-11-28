import { useEffect } from "react";
import AboutUsContent from "../Components/AboutUs/AboutUsContent";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import ServiceComponent from "../Components/Cab/Service/ServiceComponent";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";


const About=()=>{
    useEffect(() => {
        // Scroll to the top of the page when the component mounts
        window.scrollTo(0, 0);
      }, []);
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <AboutUsContent/>
        <ServicesComponent/>
        {/* <OurTeamContent/> */}
        <ServiceComponent/>
        {/* <ChooseUs/> */}
        <Testimonials/>
        <Instagram/>
        <FooterComponent/>
        </>
    )
}

export default About;