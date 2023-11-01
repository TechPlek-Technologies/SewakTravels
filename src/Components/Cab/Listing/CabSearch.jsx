import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
import Img from "../../Common/Img";
import { useContext, useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";
import { AppContext } from "../../../Context/JourneyContext";
import { useRef } from "react";
import { useEffect } from "react";

const CabSearch = ({ resClass, setSearchBarOpen, searchBarOpen,setPickup,setDestination,pickup,destination }) => {
  const [startDate, setStartDate] = useState(new Date());

  const context = useContext(AppContext);
  const { journeyData, setJourneyData } = context;
  const fromAutoCompleteRef = useRef();
  const toAutoCompleteRef = useRef();
  const fromInputRef = useRef();
  const toInputRef = useRef();
  const pickupDate = new Date(journeyData?.pickupDate)|| null;

  const options = {
    componentRestrictions: { country: "in" },
    fields: ["address_components", "geometry", "icon", "name"],
    types: ["establishment"],
  };

  useEffect(() => {
    fromAutoCompleteRef.current = new window.google.maps.places.Autocomplete(
      fromInputRef.current,
      options
    );

    toAutoCompleteRef.current = new window.google.maps.places.Autocomplete(
      toInputRef.current,
      options
    );

    fromAutoCompleteRef.current.addListener("place_changed", async function () {
      const place = await fromAutoCompleteRef.current.getPlace();
      const pickupName = place.name.trim();
      setPickup(pickupName);
    });
    
    toAutoCompleteRef.current.addListener("place_changed", async function () {
      const place = await toAutoCompleteRef.current.getPlace();
      const destinationName = place.name.trim();
      setDestination(destinationName);
    });
  }, []);
 
  return (
    <div className="flight-search">
      <div
        className={`flight-search-detail ${searchBarOpen ? "show" : ""} ${ 
          resClass ? resClass : ""
        }`}
      >
        <form className="row m-0">
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Trip Type</label>
              <select
                type="text"
                className="form-control open-select"
                id="exampleInputEmail1"
                placeholder="pick up"
                
              >
                <option value="option1">{journeyData?.tripType =="Round Trip" ? "Round Trip" : "One Way"} </option>
                <option value="option2">{journeyData?.tripType=="One Way" ? "One Way" : "Round Trip"}</option>
              </select>

              {/* <Img
                src="/assets/images/icon/table-no.png"
                className="img-fluid "
                alt=""
              /> */}
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Pickup Location</label>
              <input
                type="text"
                className="form-control open-select"
                id="exampleInputEmail1"
                placeholder={pickup}
                ref={fromInputRef}
              />
              {/* <Img
                src="/assets/images/icon/from.png"
                className="img-fluid "
                alt=""
              /> */}
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Drop off Location</label>
              <input
                type="text"
                className="form-control open-select"
                placeholder={destination}
                ref={toInputRef}
              />
              {/* <Img
                src="/assets/images/icon/location.png"
                className="img-fluid "
                alt=""
              /> */}
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Pickup Date</label>
              <div className="input-group">
                {/* <DatePickerComponent start={pickupDate} setStart={setStartDate} /> */}
              </div>
            </div>
          </div>
          <div id="dropdate" className="col">
            <div className="form-group">
              <label className="font-xs-white">Pickup Time</label>
              <div className="input-group">
                {/* <DatePickerComponent setStart={setStartDate} start={startDate} />
                 */}
                <TimePickerComponent />
              </div>
            </div>
          </div>
          <div className="col search-col">
            <div className="search-btn">
              <Link
                href="/cab/listing/list-view/left-sidebar"
                className="btn btn-solid color1"
              >
                {"Update"}
              </Link>
            </div>
          </div>
          <div
            className="responsive-close"
            onClick={() => setSearchBarOpen && setSearchBarOpen(!searchBarOpen)}
          >
            <i className="far fa-times-circle" />
          </div>
        </form>
      </div>
    </div>
  );
};

export default CabSearch;
