import { useCallback, useState } from "react";
import SearchTabs from "./CabSearch/SearchTabs";
import { TabContent, TabPane } from "reactstrap";
import { Link } from "react-router-dom";
import FlightSearch from "./FlightSearch/FlightSearch";
import HotelSearch from "./HotelSearch/HotelSearch";
import CabSearch from "./CabSearch/CabSearch";
import TourSearch from "./TourSearch/TourSearch";
import OutstationDataState from "../../../Hooks/OutstationDataState";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";

const NewHomeBanner = () => {
  const {
    selectedValue,
    source,
    destination,
    startDate,
    startTime,
    returnDate,
    returnTime,
  } = OutstationDataState();
  console.log("source:", source)

  const [source1, setSource1] = useState(source);
  const [destination1, setDestination1] = useState(destination);
  const { journeyData, setJourneyData } = useContext(AppContext);
  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback((tab) => {
    setActiveTab(tab);
  }, []);

  const handleSearch = () => {
    // Modify the state using the setJourneyData function
    setJourneyData({
      selectedValue,
      source1,
      destination1,
      startDate,
      startTime,
      returnDate,
      returnTime,
    });

    console.log("journeyData:", journeyData)
  };

  const isButtonDisabled = source1 === "" || destination1 === "";

  return (
    <section className="home_section p-0">
      <div>
        <div
          className="home home-mobile"
          id="block"
          style={{ width: "100%" }}
          data-vide-bg="/assets/video/city.mp4"
          data-vide-options="position: 0% 50%, loop: true"
        >
          <div className="container custom-container mix-layout-section">
            <div className="row">
              <div className="col-xl-10 m-auto">
                <div className="home-content mix-layout smaller-content">
                  <div className="bg-transparent">
                    <h1>Where Do You Want Go ?</h1>
                    <h3>Experience world class services trip in India</h3>
                    <SearchTabs callbackActive={callback} />
                    <TabContent
                      activeTab={activeTab}
                      className="tab-content"
                      id="pills-tabContent"
                    >
                      <TabPane tabId="1">
                        <div className="mix-demo-classic">
                          <CabSearch
                            setSource1={setSource1}
                            setDestination1={setDestination1}
                          />
                        </div>
                      </TabPane>
                      <TabPane tabId="2">
                        <div className="mix-demo-flight">
                          <FlightSearch />
                        </div>
                      </TabPane>
                      <TabPane tabId="3">
                        <div className="mix-demo-flight">
                          <HotelSearch />
                        </div>
                      </TabPane>
                      <TabPane tabId="4">
                        {" "}
                        <div className="mix-demo-flight">
                          <TourSearch />
                        </div>
                      </TabPane>
                    </TabContent>
                    <div className="btn-search col-2 searchButton">
                      <Link
                        to={
                          isButtonDisabled
                            ? "/" // Link to a placeholder if the button is disabled
                            : `/cab/listing/${encodeURIComponent(
                                source1
                              )}/${encodeURIComponent(destination1)}`
                        }
                        className={`btn btn-rounded color1 searchButton ${
                          isButtonDisabled ? "disabled" : ""
                        }`}
                        onClick={isButtonDisabled ? "" : handleSearch}
                      >
                        {"Search"}
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default NewHomeBanner;
