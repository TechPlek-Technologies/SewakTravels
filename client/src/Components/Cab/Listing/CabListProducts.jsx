import { Link } from "react-router-dom";
import Button from "../../Common/Button";
import { useContext, useEffect } from "react";
import { AppContext } from "../../../Context/JourneyContext";
import { useState } from "react";
import Popup from "./Popup";
import { PaymentContext } from "../../../Context/PaymentContext";

function CabListProducts({ data,isValid }) {
  const { journeyData } = useContext(AppContext);
  const [showDetails, setShowDetails] = useState(false);
  const [selectedItem, setSelectedItem] = useState(null);

  let travelDistance = journeyData.travelDistance;
  let travelTime = Math.ceil(travelDistance / 250);
  if(journeyData.selectedValue==="Outstation Round-Trip"){
    travelDistance=travelDistance*2;
    travelTime=Math.ceil(travelDistance/250)
  }

  const calculateFare = (item, selectedValue, travelDistance, travelTime) => {
    let totalFare = 0;
    let farePerKm = 0;

    if (selectedValue === "Outstation One-Way") {
      totalFare = item.outstationOneWay * travelDistance + travelTime * item.driverAllowance + travelTime * item.nightCharges;
      farePerKm = item.outstationOneWay;
    } else if (selectedValue === "Outstation Round-Trip") {
      totalFare = item.outstattionRoundTrip * travelDistance + travelTime * item.driverAllowance + travelTime * item.nightCharges;
      farePerKm = item.outstattionRoundTrip;
    } else if (selectedValue === "Hourly Rentals") {
      totalFare = item.rentals2 * travelDistance + travelTime * item.driverAllowance + travelTime * item.nightCharges;
      farePerKm = item.rentals2;
    } else if (selectedValue === "Airport Transfer") {
      totalFare = item.Airport * travelDistance + travelTime * item.driverAllowance + travelTime * item.nightCharges;
      farePerKm = item.Airport;
    }

    return { totalFare, farePerKm, totalDistance: travelDistance, totalTime: travelTime,driverAllowance:item.driverAllowance * travelTime,nightCharges: travelTime * item.nightCharges };
  };


  const toggleDetails = (item) => {
    setShowDetails(!showDetails);
    setSelectedItem(item);
  };


  const {paymentData,setPaymentData}=useContext(PaymentContext);


  const bookNow = (item) => {
    const fareCalculation = calculateFare(
      item,
      journeyData.selectedValue,
      travelDistance,
      travelTime,
      
    );
    setPaymentData({...paymentData, ...fareCalculation})
   
  };

  useEffect(()=>{
    if(travelDistance===""){
      // window.location.href = "/";
    }
        },[paymentData])

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
                      {travelTime} day
                    </li>
                  </ul>
                </div>
              </div>
              <div className="col-md-2">
                <div className="price">
                  <div>
                    {journeyData.selectedValue === "Outstation One-Way" && (
                      <>
                        <h4>
                          ₹
                          {item.outstationOneWay * journeyData?.travelDistance +
                            travelTime * item.driverAllowance +
                            travelTime * item.nightCharges}
                        </h4>
                        <h6>fare/km:₹{item.outstationOneWay}</h6>
                      </>
                    )}
                    {journeyData.selectedValue === "Outstation Round-Trip" && (
                      <>
                        <h4>
                          ₹
                          {item.outstattionRoundTrip * travelDistance +
                            travelTime * item.driverAllowance +
                            travelTime * item.nightCharges}
                        </h4>
                        <h6>fare/km:₹{item.outstattionRoundTrip}</h6>
                      </>
                    )}
                    {journeyData.selectedValue === "Hourly Rentals" && (
                      <>
                        <h4>
                          ₹
                          {item.rentals1 * travelDistance +
                            travelTime * item.driverAllowance +
                            travelTime * item.nightCharges}
                        </h4>
                        <h6>fare/km:₹{item.rentals2}</h6>
                      </>
                    )}
                    {journeyData.selectedValue === "Airport Transfer" && (
                      <>
                        <h4>
                          ₹
                          {item.Airport * travelDistance +
                            travelTime * item.driverAllowance +
                            travelTime * item.nightCharges}
                        </h4>
                        <h6>fare/km:₹{item.Airport}</h6>
                      </>
                    )}
                    <h6
                      onClick={() => toggleDetails(item)}
                      className="viewFairDetails"
                      
                    >
                      view details
                    </h6>

                    {showDetails && selectedItem && (
                      <Popup
                      travelDistance={travelDistance}
                      selectedValue={journeyData.selectedValue}
                        car={selectedItem}
                        modal={showDetails}
                        toggle={() => toggleDetails(null)}
                      />
                    )}
                  </div>
                </div>
              </div>
              <div onClick={() => bookNow(item)} className="col-md-3">
                <div className="book-flight">
                  <Link  to={`/journey-details/${item.id}`}>
                    <Button isValid={isValid}  btnClass="btn btn-solid color1" name="book now" />
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
