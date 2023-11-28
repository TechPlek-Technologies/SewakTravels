import { Link } from "react-router-dom";
import TextSplit from "./TextSplit";

const BannerContent = () => {
  return (
    <div className="banner-content">
      <div>
         
          <>
            <div className="offer-text">
              <span className="offer">{"Offer"}</span>
              <h6>
                <TextSplit text="limited time" />
              </h6>
            </div>
            <h5>
              special <span>nature</span> tour offer
            </h5>
          </>
        

        <h2>
          {"Discount"} <span>20-30%</span>
        </h2>
        
       
        <div className="bottom-section">
          <Link href="/tour/booking/booking-page" className="btn btn-rounded btn-sm color1">
            {"Buy Now"}
          </Link>
          <div className="info-btn"><h6>7 days &nbsp; | &nbsp; 8 nights</h6></div>
        </div>
      </div>
    </div>
  );
};

export default BannerContent;
