import { imagesection1, imagesection2, imagesection3 } from "../../Data/CabData";
import CabBookingForm from "./CabBookingForm";
import CarDetailPage from "./CarDetailPage";
import ContactInfo from "./ContactInfo";
import ImageSection from "./ImageSection";

function SingleDetailPage({desiredcar}){
    return (
      <section className="single-section small-section bg-inner">
        <div className="container">
          <div className="row">
            <div className="col-xl-9 col-lg-8">
            <ImageSection imagesection1={imagesection1} imagesection2={imagesection2} imagesection3={imagesection3} />
  
              <CarDetailPage desiredcar={desiredcar} />
            </div>
            <div className="col-xl-3 col-lg-4 ">
              <div className="single-sidebar">
                <div className="selection-section flight-search">
                  <h4 className="title">{"Book Your Ride"}</h4>
                  <div className="flight-search-detail cab-form-input">
                    <CabBookingForm />
                  </div>
                </div>
              </div>
              <ContactInfo />
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default SingleDetailPage;
  