import { Link } from "react-router-dom";
import { cabOfferData } from "../../../../Data/Offers";
import TitleComponent from "../../../Common/TitleComponent";
// import SliderSeven from "./SliderSeven";
import SliderSevenTest from "./SliderSevenTest";

const Package = ({type}) => {


  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        
        <TitleComponent title={"New Offers"} subTitle={"Cab Offers"} span={"Cab Offers"} titleClass={"title-3 "} />
         
        <div className="row">
          <div className="col">
            <SliderSevenTest type={type} slideData={cabOfferData} /> 
            {/* <div className="new-line-container">
                    <Link
                      className={`btn btn-rounded color1 packageButton`}
                    >
                      {"View All"}
                    </Link>
                    </div> */}
          </div>
        </div>
      </div>
    </section>
  );
};

export default Package;
