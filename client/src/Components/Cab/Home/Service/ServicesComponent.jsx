import { services } from "../../../../Data/Service";
import Animation from "../../../Common/Animation";
import ServiceOne from "./ServiceOne";

const ServicesComponent = () => {
    return (
      <section className="section-b-space animated-section">
        <Animation />
        <div className="container">
        <div className="title-1 detail-title">
            <h2>Setting the Standard: What Sets Us Apart from the Rest?</h2>
            <p>{"At Sewak Travels, we are more than just a transportation company; we are your trusted travel companion, committed to enhancing every step of your journey. With our unwavering dedication to excellence and customer satisfaction, we strive to exceed your expectations with every ride."}</p>
          </div>
          <ServiceOne serviceData={services} />
        </div>
      </section>
    );
  };
  
  export default ServicesComponent;