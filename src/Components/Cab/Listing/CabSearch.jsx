import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
// import Img from "../../Common/Img";
import { useContext, useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";
import { useRef } from "react";
import { calculateDistanceAndDuration } from "../../../Utility/DistanceCalculator";
import useAutocomplete from "../../../Utility/Autocomplete";
import retrieveDataFromLocalStorage from "../../../Utility/RetrieveDataFromLocalStorage";

const CabSearch = ({
  resClass,
  setSearchBarOpen,
  searchBarOpen,
  setPickup,
  setDestination,
  destination,
  pickup,
}) => {
  const journeyData = retrieveDataFromLocalStorage();

  const [selectedValue, setSelectedValue] = useState(journeyData.selectedValue);

  console.log("sele:", selectedValue)
  const handleTripTypeChange = (e) => {
    setSelectedValue(e.target.value);
  };
  const updateChanges = () => {};

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
                onChange={handleTripTypeChange}
                value={selectedValue}
                style={{ width: "180px" }}
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
                defaultValue={pickup}
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
                defaultValue={destination}
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
                <DatePickerComponent startDate={new Date(journeyData.startDate)} newClass={true} />
              </div>
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Return Date</label>
              <div className="input-group customdate">
                <DatePickerComponent startDate={new Date(journeyData.returnDate)} newClass={true} />
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
