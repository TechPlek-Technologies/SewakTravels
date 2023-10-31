import Img from "../Common/Img";
import Coupon from "./Coupan";
import GuestDetailPage from "./GuestDetailPage";
import InformationPage from "./InformationPage";
import Summary from "./Summary";


function MainBooking(){
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
              <InformationPage type="cab" />
            </div>
          </div>
          <div className="col-lg-4 booking-order res-margin">
            <div className="review-section">
              <Summary />
              <Coupon />
              <div className="review_box">
                <Img src="/assets/images/cab/advertise.jpg" className="img-fluid" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default MainBooking;
