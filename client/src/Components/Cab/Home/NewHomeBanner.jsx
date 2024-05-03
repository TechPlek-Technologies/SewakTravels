import { Link } from "react-router-dom";
import { TabContent, TabPane } from "reactstrap";
import CabSearch from "./CabSearch/CabSearch";
import SearchTabs from "./CabSearch/SearchTabs";
import FlightSearch from "./FlightSearch/FlightSearch";
import HotelSearch from "./HotelSearch/HotelSearch";
import TourSearch from "./TourSearch/TourSearch";
const NewHomeBanner = ({
  activeTab,
  callback,
  handlePopupClose,
  pathParams,
  setStartDate,
  setReturnDate,
  setStartTime,
  setReturnTime,
  setSelectedValue,
  setSource,
  setDestination,
}) => {
 

  return (
    <section className="home_section slide-1 p-0" id="home">
      <div>
        <div
          className="home home-mobile"
          id="block"
          style={{ width: "100%" }}
          data-vide-bg="/assets/video/city.jpg"
        >
          <video
            width="100%"
            height="100%"
            controls={false}
            autoPlay
            className="video-mixed"
          >
            <source src="/assets/video/city.mp4" type="video/mp4" />
          </video>
          <div className="container custom-container mix-layout-section">
            <div className="row">
              <div className="col-xl-10 m-auto">
                <div className="home-content mix-layout smaller-content">
                  <div className="bg-transparent">
                    <SearchTabs callbackActive={callback} />
                    <TabContent
                      activeTab={activeTab}
                      className="tab-content"
                      id="pills-tabContent"
                    >
                      <TabPane tabId="1"> 
                        <div className="mix-demo-classic">
                          <CabSearch
                            source={pathParams.source}
                            destination={pathParams.destination}
                            setSource={setSource}
                            setDestination={setDestination}
                            selectedValue={pathParams.selectedValue}
                            setSelectedValue={setSelectedValue}
                            startDate={pathParams.startDate}
                            setStartDate={setStartDate}
                            returnDate={pathParams.returnDate}
                            setReturnDate={setReturnDate}
                            setStartTime={setStartTime}
                            setReturnTime={setReturnTime}
                            setRentals={pathParams.setRentals}
                          />
                        </div>
                      </TabPane>
                      <TabPane tabId="2">
                        <div className="mix-demo-flight">
                          <FlightSearch
                            selectedValue={pathParams.selectedValue}
                            setSelectedValue={setSelectedValue}
                          />
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
                      
                        className={`btn btn-rounded color1 searchButton`}
                        onClick={handlePopupClose}
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
