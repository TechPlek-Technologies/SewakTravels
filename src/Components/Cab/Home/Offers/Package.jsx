import { useState } from "react";
import { cabOfferData, hotelOffers } from "../../../../Data/Offers";
import TitleComponent from "../../../Common/TitleComponent";
import SliderSeven from "./SliderSeven";
import { useEffect } from "react";

const Package = ({type}) => {

  const [offersData,setOffersData]= useState([]);

  useEffect(() => {
    if (type === "Cab Offers") {
      setOffersData(cabOfferData);
    } else if(type === "Hotel Offers"){
      setOffersData(hotelOffers)
    }
  }, [type]);

  return (
    <section className="category-wrapper section-b-space">
      <div className="container">
        
        <TitleComponent title={"New Offers"} subTitle={"Famous Destinations"} span={"Cab Booking"} titleClass={"title-3 "} />
         
        <div className="row">
          <div className="col">
            <SliderSeven type={type} slideData={offersData} /> 
          </div>
        </div>
      </div>
    </section>
  );
};

export default Package;
