import { packageData } from "../../../../Data/Offers";
import TitleComponent from "../../../Common/TitleComponent";
import TitleThree from "../../Ourvehicle/TitleThree";
import SliderSeven from "./SliderSeven";

const Package = () => {
  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        
        <TitleComponent title={"New Offer"} subTitle={"Awesome Package"} span={"Package"} titleClass={"title-3 "} />
         
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
