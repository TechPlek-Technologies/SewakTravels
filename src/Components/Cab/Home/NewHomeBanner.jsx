import { useCallback, useState } from "react";
import SearchTabs from "./CabSearch/SearchTabs";
import { TabContent, TabPane } from "reactstrap";
import { Link } from "react-router-dom";
import FlightSearch from "./FlightSearch/FlightSearch";
import HotelSearch from "./HotelSearch/HotelSearch";
import CabSearch from "./CabSearch/CabSearch";
import TourSearch from "./TourSearch/TourSearch";


const NewHomeBanner = () => {



  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback((tab) => {
    setActiveTab(tab);
  }, []);




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
                    <h3>
                      Experience world class services trip in Japan featured
                    </h3>
                    <SearchTabs callbackActive={callback} />
                    <TabContent
                      activeTab={activeTab}
                      className="tab-content"
                      id="pills-tabContent"
                    >
                      <TabPane tabId="1">
                        <div className="mix-demo-classic">
                          <CabSearch />
                        </div>
                      </TabPane>
                      <TabPane tabId="2">
                        <div className="mix-demo-flight">
                        <FlightSearch />
                        </div>
                      </TabPane>
                      <TabPane tabId="3">
                        <div className="mix-demo-flight">
                        <HotelSearch/>
                        </div>
                      </TabPane>
                      <TabPane tabId="4"> <div className="mix-demo-flight">
                        <TourSearch/>
                        </div></TabPane>
                    </TabContent>
                    <div className="btn-search col-2 searchButton"
                 >
                      <Link
                        to="/cab/listing"
                        className= "btn btn-rounded color1 searchButton"
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
