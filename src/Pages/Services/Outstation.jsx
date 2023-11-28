import { useEffect } from "react";
import Testimonials from "../../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../../Components/Common/FooterComponent";
import ChooseUs from "../../Components/Services/OutStation/ChooseUs";
import OutstationContent from "../../Components/Services/OutStation/OutstationContent";
import Layout from "../../Layout/Layout";

const Outstation=()=>{
    useEffect(() => {
        // Scroll to the top of the page when the component mounts
        window.scrollTo(0, 0);
      }, []);
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <OutstationContent/>
        <ChooseUs/>
        <Testimonials/>
        <FooterComponent/>
        </>
    )
}

export default Outstation;