// import SeachVector from "./SearchVector";

import { Link } from "react-router-dom";
import CabSearch1 from "./CabSearch/CabSearch1";
import "./HomeBanner1.css"
import Img from "./Img.tsx";
const HomeBanner1 = ({
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
    <section className="home_section p-0">
      <div className="home home-padding">
        <Img
          src="/assets/images/background.jpg"
          className="bg-img img-fluid"
          alt=""
        />
        <div className="animation-bg">
          <div className="container custom-container mix-layout-section">
            <div className="row">
              <div className="col-lg-10 m-auto searchBannerWidth">
                {/* <SeachVector /> */}
                <CabSearch1
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
            </div>
          </div>

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
    </section>
  );
};

export default HomeBanner1;
