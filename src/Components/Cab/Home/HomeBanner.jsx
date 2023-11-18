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
import SearchComponent from "./BannerSearch/SearchComponent";

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
                    <SearchTabs callbackActive={callback} />
          <div className="col-xl-10 m-auto">
            <div className="cab-content">
            <div className="home-content mix-layout smaller-content">
                  <div className="bg-transparent">
                    <h1>Where Do You Want Go ?</h1>
                    <h3>Experience world class services trip in Japan featured</h3>
                    <TabContent activeTab={activeTab} className="tab-content" id="pills-tabContent">
                      <TabPane tabId="1">
                        <div className="mix-demo-classic">
                          <SearchComponent />
                        </div>
                      </TabPane>
                      <TabPane tabId="2">
                        {/* <TourSearch /> */}
                      </TabPane>
                      <TabPane tabId="3">
                        <div className="mix-demo-flight">
                          {/* <FlightSearch /> */}
                        </div>  
                      </TabPane>
                      <TabPane tabId="4">
                        {/* <CabSearch /> */}
                      </TabPane>
                      <TabPane tabId="5">
                        {/* <FoodSearch /> */}
                      </TabPane>
                    </TabContent>
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
