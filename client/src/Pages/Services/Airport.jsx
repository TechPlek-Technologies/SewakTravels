import { useEffect } from "react";
import Testimonials from "../../Components/Cab/Home/Testimonials/Testimonials";
import FooterComponent from "../../Components/Common/FooterComponent";
import AirportContent from "../../Components/Services/Airport/AirportContent";
import ChooseUs from "../../Components/Services/Airport/ChooseUs";
import Layout from "../../Layout/Layout";

const Airport=()=>{
    useEffect(() => {
        // Scroll to the top of the page when the component mounts
        window.scrollTo(0, 0);
      }, []);
    return(<>
        <Layout title="light_header" userBgClass="user user-light" />
        <AirportContent/>
        <ChooseUs/>
        <Testimonials/>
        <FooterComponent/>
        </>
    )
}

export default Airport;