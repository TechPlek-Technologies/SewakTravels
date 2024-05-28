import { Link } from "react-router-dom";
import { cabOfferData } from "../../../../Data/Offers";
import TitleComponent from "../../../Common/TitleComponent";
// import SliderSeven from "./SliderSeven";
import SliderSevenTest from "./SliderSevenTest";
import CabAnimation from "../../CallService/CabAnimation";

const Package = ({type,handlePopupClose,setClickOffers,setOfferData}) => {


  return (
    <section className="category-wrapper section-b-space animated-section">
      <CabAnimation />
      <div className="container">
        
        <TitleComponent title={"New Offers"} subTitle={"Cab Offers"} span={"Cab Offers"} titleClass={"title-3 "} />
         
        <div className="row">
          <div className="col">
            <SliderSevenTest type={type} slideData={cabOfferData} handlePopupClose={handlePopupClose} setClickOffers={setClickOffers} setOfferData={setOfferData}/> 
         
          </div>
        </div>
      </div>
    </section>
  );
};

export default Package;
