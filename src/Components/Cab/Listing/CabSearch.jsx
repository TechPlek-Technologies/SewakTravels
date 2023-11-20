import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
// import Img from "../../Common/Img";
import { useContext, useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";
import { AppContext } from "../../../Context/JourneyContext";
import { useRef } from "react";
import { calculateDistanceAndDuration } from "../../../Utility/DistanceCalculator";
import useAutocomplete from "../../../Utility/Autocomplete";

const CabSearch = ({
  resClass,
  setSearchBarOpen,
  searchBarOpen,
  setPickup,
  setDestination,
  destination,
  pickup,
}) => {
  const context = useContext(AppContext);
  const { journeyData, setJourneyData } = context;
  // console.log("jouenryData:"+ journeyData)

  const [selectedValue, setSelectedValue] = useState(
    journeyData?.tripType || "One Way"
  );

  const handleTripTypeChange = (e) => {
    setSelectedValue(e.target.value);
  };
  const updateChanges = () => {
    calculateDistanceAndDuration(
      pickup,
      destination,
      journeyData?.pickupDate,
      selectedValue,
      journeyData,
      setJourneyData
    );
  };

  const fromInputRef = useRef();
  const toInputRef = useRef();

  useAutocomplete(fromInputRef, setPickup);
  useAutocomplete(toInputRef, setDestination);

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
                  className="form-control open-select"
                  value={selectedValue}
                  placeholder="pick up"
                  onChange={handleTripTypeChange}
                  style={{width:"180px"}}
                >
                  <option value="Outstation One-Way"> One-Way</option>
                  <option value="Outstation Round-Trip">Round-Trip</option>
                  <option value="Airport Transfer">Airport Transfer</option>
                  <option value="Hourly Rentals">Hourly Rentals</option>
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
              <label className="font-xs-white">Source</label>
              <input
                type="text"
                className="form-control open-select"
                id="exampleInputEmail1"
                defaultValue={journeyData?.pickup}
                placeholder="Source"
                ref={fromInputRef}
                required
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
              <label className="font-xs-white">Destination</label>
              <input
                type="text"
                className="form-control open-select"
                defaultValue={journeyData?.dropoff}
                placeholder="Destination"
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
              <div className="input-group customdate">
                <DatePickerComponent />
              </div>
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Return Date</label>
              <div className="input-group customdate">
                <DatePickerComponent />
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
                onClick={updateChanges}
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
