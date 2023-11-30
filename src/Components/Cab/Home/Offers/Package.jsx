import { cabOfferData } from "../../../../Data/Offers";
import TitleComponent from "../../../Common/TitleComponent";
import SliderSeven from "./SliderSeven";

const Package = ({type}) => {


  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        
        <TitleComponent title={"New Offers"} subTitle={"Famous Destinations"} span={"Cab Booking"} titleClass={"title-3 "} />
         
        <div className="row">
          <div className="col">
            <SliderSeven type={type} slideData={cabOfferData} /> 
          </div>
        </div>
      </div>
    </section>
  );
};

export default Package;
