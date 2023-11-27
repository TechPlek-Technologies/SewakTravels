import { packageData } from "../../../../Data/Offers";
import TitleThree from "../../Ourvehicle/TitleThree";
import SliderSeven from "./SliderSeven";

const Package = () => {
  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        <TitleThree title={"New Offer"} subTitle={"Awesome Package"} desc="Trips, experiences, and places. All in one service." classTitle="title-1 title-5" />
        <div className="row">
          <div className="col">
            <SliderSeven slideData={packageData} /> 
          </div>
        </div>
      </div>
    </section>
  );
};

export default Package;
