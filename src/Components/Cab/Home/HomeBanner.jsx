import { Link } from "react-router-dom";
import {  useState } from "react";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";
import SearchTabs from "./BannerSearch/SearchTabs";
import { useCallback } from "react";
import { TabContent, TabPane } from "reactstrap";
import OutStationSearch from "./BannerSearch/OutStationSearch";
import { calculateDistanceAndDuration } from "../../../Utility/DistanceCalculator";
import AirportSearch from "./BannerSearch/AirportSearch";

function HomeBanner() {
  const [selectedValue, setSelectedValue] = useState("One Way"); // Set the initial selected value
  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback(
    (tab) => {
      setActiveTab(tab);
    },
    []
  );
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const [pickup, setPickup] = useState("");
  const [pickupDate, setPickupDate] = useState(tomorrow);
  const [destination, setDestination] = useState("");
  const context = useContext(AppContext);
  const { journeyData, setJourneyData } = context;

  
  const handleRadioChange = (event) => {
    setSelectedValue(event.target.value); // Update the selected value when a radio button is changed
  };


  const updateContext = () => {
    calculateDistanceAndDuration(pickup, destination, pickupDate, selectedValue, journeyData, setJourneyData);
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
                    <h2>+91-800-355-1111</h2>
                  </div>
                </div>

                <div className="bg-transparent">
                  <SearchTabs callbackActive={callback} />
                  <TabContent
                    activeTab={activeTab}
                    className="tab-content"
                    id="pills-tabContent"
                  >
                    <TabPane tabId="1">
                      <div className="mix-demo-classic">
                        <OutStationSearch
                          pickup={pickup}
                          pickupDate={pickupDate}
                          setPickupDate={setPickupDate}
                          setPickup={setPickup}
                          setDestination={setDestination}
                          selectedValue={selectedValue}
                          handleRadioChange={handleRadioChange}
                        />
                      </div>
                    </TabPane>
                    <TabPane tabId="2">
                    <div className="mix-demo-classic">
                        <AirportSearch
                          pickup={pickup}
                          pickupDate={pickupDate}
                          setPickupDate={setPickupDate}
                          setPickup={setPickup}
                          setDestination={setDestination}
                          selectedValue={selectedValue}
                          handleRadioChange={handleRadioChange}
                        />
                      </div>
                    </TabPane>

                    <TabPane tabId="3">
                    <div className="mix-demo-classic">
                        <AirportSearch
                          pickup={pickup}
                          pickupDate={pickupDate}
                          setPickupDate={setPickupDate}
                          setPickup={setPickup}
                          setDestination={setDestination}
                          selectedValue={selectedValue}
                          handleRadioChange={handleRadioChange}
                        />
                      </div>
                    </TabPane>
                   
                  </TabContent>
                </div>

                <div className="car-select">
                 
                  <Link
                    onClick={(e) => {
                      if (pickup === "" || destination === "") {
                        e.preventDefault(); // Prevent the link from navigating
                        alert("fill the input boxes"); // Show the popup
                      } else {
                        updateContext();
                      }
                    }}
                    to="/cab/listing"
                    className={`btn btn-solid `}
                    
                  >
                    Book now
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
