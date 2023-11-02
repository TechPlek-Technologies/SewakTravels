import { services } from "../../../../Data/Service";
import Animation from "../../../Common/Animation";
import TitleComponent from "../../../Common/TitleComponent";
import ServiceOne from "./ServiceOne";

const ServicesComponent = () => {
    return (
      <section className="section-b-space animated-section">
        <Animation />
        <div className="container">
          <TitleComponent title={"Sewak Travels"} subTitle={"Awesome Service"} span={"Service"} titleClass={"title-3"} />
          <ServiceOne serviceData={services} />
        </div>
      </section>
    );
  };
  
  export default ServicesComponent;