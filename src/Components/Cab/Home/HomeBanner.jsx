import { Link } from "react-router-dom";
import CabSearch from "./CabSearch";
import { useState } from "react";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";

function HomeBanner() {
  const [pickup,setPickup]=useState("");
  const [destination,setDestination]=useState("");

  const context= useContext(AppContext);
  const {journeyData,setJourneyData}=context;

  const updateContext = () => {
    // Create a new object with the updated value
    const updatedObject = { ...journeyData, pickup: pickup,dropoff:destination };
    setJourneyData(updatedObject);
  };

  return (
    <section className="cab-section p-0">
      <div className="container">
        <div className="row">
          <div className="col-xl-5 col-lg-6">
            <div className="cab-content">
              <div>
                <div className="call-section">
                  <div className="call">
                    <i className="fas fa-phone-alt"></i>
                    <h2>800-5-800</h2>
                  </div>
                </div>
                <h2>Great Journey Begins</h2>
                <h3>Upto 25% off on first booking through your app</h3>
                <CabSearch setPickup={setPickup} setDestination={setDestination}/>
                <div className="car-select">
                  <ul>
                    <li className="active">classic</li>
                    <li>suv</li>
                    <li>luxury</li>
                  </ul>
                  <Link onClick={updateContext} to={`/cab/listing?source=${pickup}?destination=${destination}`} className="btn btn-solid">
                    book now
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export default HomeBanner;
