import { useContext, useState } from "react";
import CabSearch from "./CabSearch";
import { Link, useParams } from "react-router-dom";
import { AppContext } from "../../../Context/JourneyContext";

function ListSearch() {
  const [searchBarOpen, setSearchBarOpen] = useState(false);

  const { journeyData } = useContext(AppContext);

  const [source, setSource] = useState(journeyData.source);
  const [destination, setDestination] = useState(journeyData.destination);
  const [startDate, setStartDate] = useState(new Date(journeyData.startDate));
  const [returnDate, setReturnDate] = useState(
    new Date(journeyData.returnDate)
  );

  const [startTime, setStartTime] = useState(journeyData.startTime);
  const [returnTime, setReturnTime] = useState(journeyData.returnTime);

  const [selectedValue, setSelectedValue] = useState(journeyData.selectedValue);

  return (
    <div className="bg-inner small-section pb-0">
      <div className="container">
        <div className="flight-search">
          <div className="responsive-detail">
            <div className="destination">
              <span>{journeyData.selectedValue}</span>
            </div>
            <div className="destination">
              <span>{source}</span>
              <span>
                <i className="fas fa-long-arrow-alt-right"></i>
              </span>
              <span>{destination}</span>
            </div>

            <div className="modify-search">
              <Link
                to={"#"}
                className="btn btn-solid color1"
                onClick={() => setSearchBarOpen(!searchBarOpen)}
              >
                Modify search
              </Link>
            </div>
          </div>
        </div>
      </div>
      <CabSearch
        resClass="res-cab"
        setSearchBarOpen={setSearchBarOpen}
        searchBarOpen={searchBarOpen}
        source={source}
        destination={destination}
        setSource={setSource}
        setDestination={setDestination}
        selectedValue={selectedValue}
        setSelectedValue={setSelectedValue}
        startDate={startDate}
        setStartDate={setStartDate}
        returnDate={returnDate}
        setReturnDate={setReturnDate}
        setStartTime={setStartTime}
        setReturnTime={setReturnTime}
        startTime={startTime}
        returnTime={returnTime}
      />
    </div>
  );
}

export default ListSearch;
