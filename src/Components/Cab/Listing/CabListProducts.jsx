import { Link } from "react-router-dom";
import Button from "../../Common/Button";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";
import { useState } from "react";
import Popup from "./Popup";

function CabListProducts({ data }) {
  const { journeyData } = useContext(AppContext);
  const [showDetails, setShowDetails] = useState(false);

  let travelDistance=journeyData.travelDistance;

  
  if(journeyData.selectedValue==="Outstation Round-Trip"){
    travelDistance=travelDistance*2;
  }

  const toggleDetails = () => {
    setShowDetails(!showDetails);
  };
  return (
    <div className="flight-detail-sec cab-detail-sec">
      <div className="detail-bar">
        {data?.map((item, index) => (
          <div className="detail-wrap wow fadeInUp" key={index}>
            <div className="row">
              <div className="col-md-3">
                <div className="logo-sec">
                  <img src={item.img} className="img-fluid" alt="" />
                  <span className="title">{item.name}</span>
                  <label>({item.cabType})</label>
                </div>
              </div>
              <div className="col-md-4">
                <div className="car-details">
                  <ul>
                    <li>
                      <img
                        src="/assets/images/cab/icon/seat.png"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      {item.capacity} seater
                    </li>
                    <li>
                      <img
                        src="/assets/images/icon/location.png"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      {travelDistance} km
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <img
                        src="/assets/images/cab/icon/snowflake.png"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      AC
                    </li>
                    <li>
                      <img
                        src="/assets/images/cab/icon/settings.png"
                        className="img-fluid"
                        alt=""
                      />{" "}
                      {journeyData?.travelTime}
                    </li>
                  </ul>
                </div>
              </div>
              <div className="col-md-2">
                <div className="price">
                  <div>
                    <h4>₹{item.fare * journeyData?.travelDistance}</h4>
                    <h6>fare/km:₹{item.fare}</h6>
                    <h6 onClick={toggleDetails} className="viewFairDetails">
                      view details
                    </h6>
                   
                    <Popup car={item} modal={showDetails} toggle={toggleDetails} />
                  </div>
                </div>
              </div>
              <div className="col-md-3">
                <div className="book-flight">
                  
                <Link to={`/journey-details/${item.id}`}>
                      <Button btnClass="btn btn-solid color1" name="book now" />
                    </Link>
                 
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default CabListProducts;
