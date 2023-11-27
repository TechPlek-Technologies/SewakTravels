import AboutUsContent from "../Components/AboutUs/AboutUsContent";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import ServiceComponent from "../Components/Cab/Service/ServiceComponent";
import ServicesComponent2 from "../Components/Cab/Service/ServiceComponent2";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";


const About=()=>{
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <AboutUsContent/>
        <ServicesComponent2/>
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