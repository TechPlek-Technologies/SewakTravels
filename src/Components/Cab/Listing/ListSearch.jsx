import { useContext, useState } from "react";
import CabSearch from "./CabSearch";
import { Link, useParams } from "react-router-dom";
import { AppContext } from "../../../Context/JourneyContext";

function ListSearch() {



  const [searchBarOpen, setSearchBarOpen] = useState(false);

  const params= useParams();

  const {journeyData}=useContext(AppContext)

  const [pickup,setPickup]= useState(params.source)
  const [destination,setDestination]= useState(params.destination)

  

  return (
    <div className="bg-inner small-section pb-0">
      <div className="container">
        <div className="flight-search">
          <div className="responsive-detail" >
            <div className="destination">
              <span>{journeyData.selectedValue}</span>
            </div>
            <div className="destination">
              <span>
                {pickup}
              </span>
              <span>
                <i className="fas fa-long-arrow-alt-right"></i>
              </span>
              <span>
                {destination}
              </span>
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
            setDestination={setDestination}
            setPickup={setPickup}
            destination={destination}
            pickup={pickup}
          />
    </div>
  );
}

export default ListSearch;
