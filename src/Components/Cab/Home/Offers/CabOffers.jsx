import { FleetData } from "../../../../Data/CabData";
import Animation from "../../../Common/Animation";
import TitleComponent from "../../../Common/TitleComponent";
import SliderThree from "../Fleetcars/SliderThree";

function CabOffers() {
    return (
      <section className="ticket-section section-b-space white-section animated-section">
        <Animation/>
        <div className="container">
          <TitleComponent
            title={"Car Offers"}
            subTitle={"Select Cab Offers"}
            span={"Offers"}
            titleClass={"title-3"}
          />
          <div className="slide-1">
            <SliderThree slideData={FleetData} />
          </div>
        </div>
      </section>
    );
  }
  
  export default CabOffers;