import { Link } from "react-router-dom";
import CabSearch from "./CabSearch";
import { useState } from "react";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";
import SearchTabs from "./BannerSearch/SearchTabs";
import { useCallback } from "react";
import { TabContent, TabPane } from "reactstrap";
import OutStationSearch from "./BannerSearch/OutStationSearch";

function HomeBanner() {
  const [selectedValue, setSelectedValue] = useState("One Way"); // Set the initial selected value
  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback(
    (tab) => {
      setActiveTab(tab);
    },
    [activeTab]
  );
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const [pickup, setPickup] = useState("");
  const [pickupDate, setPickupDate] = useState(tomorrow);
  const [destination, setDestination] = useState("");

  const context = useContext(AppContext);
  const { journeyData, setJourneyData } = context;

  const updateContext = () => {
    // Create a new object with the updated values

    const updatedObject = {
      ...journeyData,
      pickup: pickup,
      dropoff: destination,
      pickupDate: pickupDate,
      tripType:selectedValue
    };
    setJourneyData(updatedObject);
  };


  
  const handleRadioChange = (event) => {
    setSelectedValue(event.target.value); // Update the selected value when a radio button is changed
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
                    <h2>+91-800-355-7800</h2>
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
                      <CabSearch />
                    </TabPane>
                    <TabPane tabId="3">
                      <div className="mix-demo-flight">
                        <CabSearch />
                      </div>
                    </TabPane>
                    <TabPane tabId="4">
                      <CabSearch />
                    </TabPane>
                    <TabPane tabId="5">
                      <CabSearch />
                    </TabPane>
                  </TabContent>
                </div>

                <div className="car-select">
                  <ul>
                    <li className="active">classic</li>
                    <li>suv</li>
                    <li>luxury</li>
                  </ul>
                  <Link
                    onClick={updateContext}
                    to="/cab/listing"
                    className="btn btn-solid"
                  >
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
