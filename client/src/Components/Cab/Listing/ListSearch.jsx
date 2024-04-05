import { useContext, useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { AppContext } from "../../../Context/JourneyContext";
import CabSearch from "./CabSearch";

function ListSearch({setisValid}) {
  const [searchBarOpen, setSearchBarOpen] = useState(false);

  const { journeyData } = useContext(AppContext);


  const [source, setSource] = useState("");
  const [destination, setDestination] = useState("");
  const [startDate, setStartDate] = useState(new Date());
  const [returnDate, setReturnDate] = useState(new Date());

  const [startTime, setStartTime] = useState();
  const [returnTime, setReturnTime] = useState();
  const [rentals, setRentals] = useState();


  const [selectedValue, setSelectedValue] = useState();

  useEffect(() => {
    // Your useEffect code here
    setSource(journeyData.source);
    setDestination(journeyData.destination);
    setStartDate(new Date(journeyData.startDate));
    setReturnDate(new Date(journeyData.returnDate));
    setStartTime(journeyData.startTime);
    setReturnTime(journeyData.returnTime);
    setSelectedValue(journeyData.selectedValue);
    setRentals(journeyData.rentalPackage)
  

   
      if (!journeyData.travelDistance) {
        setisValid("notValid"); // Replace "/" with the actual path of your home page
      }else{
        setisValid("")
      }
    


    
  }, [journeyData]);

  return (
    <div className="bg-inner small-section1 pb-0">
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
        rentals={rentals}
        setRentals={setRentals}
      />
    </div>
  );
}

export default ListSearch;
