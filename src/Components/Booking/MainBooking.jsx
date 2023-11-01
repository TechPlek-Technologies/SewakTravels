import { carData } from "../../Data/CabData";
import CarDetailPage from "../CabDetails/CarDetailPage";
import ContactInfo from "../CabDetails/ContactInfo";
import Img from "../Common/Img";
import Coupon from "./Coupan";
import GuestDetailPage from "./GuestDetailPage";
import InformationPage from "./InformationPage";
import Summary from "./Summary";


function MainBooking(){ 
  const desiredcar = carData.find(car => car.id === 1);
  return (
    <section className="small-section">
      <div className="container">
        <div className="row">
          <div className="col-lg-8">
            <div className="review-section">
              <div className="review_box">
                <div className="title-top">
                  <h5>{"Contact Details"}</h5>
                </div>
                <GuestDetailPage />
              </div>
              <div className="review_box">
                <div className="title-top">
                  <h5>{"Cab Details"}</h5>
                </div>
                <CarDetailPage desiredcar={desiredcar} /> 
              </div>
              <InformationPage type="cab" />
            </div>
          </div>
          <div className="col-lg-4  booking-order res-margin">
            <div className="review-section">
              <Summary />
              <div >
              <ContactInfo/>
              </div>
            </div>
            
            
          
          </div>
          
        </div>
      </div>
    </section>
  );
};

export default MainBooking;
