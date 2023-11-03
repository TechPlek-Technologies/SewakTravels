import AboutUsContent from "../Components/AboutUs/AboutUsContent";
import OurTeamContent from "../Components/AboutUs/OurTeamContent";
import Instagram from "../Components/Cab/Home/Gallery/Instagram";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import ChooseUs from "../Components/Cab/Service/ChooseUs";
// import ServiceComponent from "../Components/Cab/Service/ServiceComponent";
import ServicesComponent2 from "../Components/Cab/Service/ServiceComponent2";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";


const About=()=>{
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <AboutUsContent/>
        <OurTeamContent/>
        <ServicesComponent2/>
        <ChooseUs/>
        <Testimonials/>
        <Instagram/>
        <FooterComponent/>
        </>
    )
}

export default About;