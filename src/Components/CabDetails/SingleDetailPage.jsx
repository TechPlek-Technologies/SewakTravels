import Payment from "../Booking/Payment";
import GuestDetailPage from "../Booking/GuestDetailPage";
import InformationPage from "../Booking/InformationPage";
import Summary from "../Booking/Summary";
import Img from "../Common/Img";
import CarDetailPage from "./CarDetailPage";
import ContactInfo from "./ContactInfo";

function SingleDetailPage({ desiredcar }) {
  return (
    <section className="single-section small-section bg-inner">
      <div className="container">
        <div className="row">
          <div className="col-lg-8">
            <div className="review-section">
              <div className="review_box">
                <div className="review_box">
                  <div className="title-top">
                    <h5>{"Cab Details"}</h5>
                  </div>
                  <CarDetailPage desiredcar={desiredcar} />
                </div>
                <div className="title-top">
                  <h5>{"Contact Details"}</h5>
                </div>
                <GuestDetailPage />
              </div>
            </div>
          </div>
          <div className="col-lg-4 booking-order res-margin">
                <div className="review-section">
                  <Payment />
                  <div className="review_box">
                    <Img
                      src="/assets/images/cab/advertise.jpg"
                      className="img-fluid"
                      alt=""
                    />
                  </div>
                </div>
              </div>
        </div>
      </div>
    </section>
  );
}

export default SingleDetailPage;
