import ChooseUs from "../../Components/Cab/Service/ChooseUs";
import ServiceComponent from "../../Components/Cab/Service/ServiceComponent";
import FooterComponent from "../../Components/Common/FooterComponent";
import Layout from "../../Layout/Layout";

const Service=()=>{
return(
    <>
      <Layout title="light_header" userBgClass="user user-light" />

      <ServiceComponent/>
      <ChooseUs/>
      <FooterComponent/>
    
    </>
)
}

export default Service;