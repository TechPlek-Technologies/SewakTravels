import { useState } from "react";
import CabSearch from "./CabSearch";
import { useContext } from "react";
import { AppContext } from "../../../Context/JourneyContext";

function ListSearch() {
  const [searchBarOpen, setSearchBarOpen] = useState(false);

  const context= useContext(AppContext);
  const {journeyData,setJourneyData}=context;

  return (
    <div className="bg-inner small-section pb-0">
      <div className="container">
        <div className="flight-search">
          <div className="responsive-detail">
            <div className="destination">
              <span>{journeyData?.pickup}</span>
              <span>
                <i className="fas fa-long-arrow-alt-right"></i>
              </span>
              <span>{journeyData?.dropoff}</span>
            </div>
            <div className="details">
              <span>02:05, 19-Aug-2023</span>
              <span className="divider">|</span>
              <span>2 Adults</span>
            </div>
            <div className="modify-search">
              <a
                href="#"
                className="btn btn-solid color1"
                onClick={() => setSearchBarOpen(!searchBarOpen)}
              >
                modify search
              </a>
            </div>
          </div>
          <CabSearch
            resClass="res-cab"
            setSearchBarOpen={setSearchBarOpen}
            searchBarOpen={searchBarOpen}
          />
        </div>
      </div>
    </div>
  );
}

export default ListSearch;
