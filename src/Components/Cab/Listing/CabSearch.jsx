import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
// import Img from "../../Common/Img";
import { useContext, useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";
import { useRef } from "react";
import useAutocomplete from "../../../Utility/Autocomplete";
import { AppContext } from "../../../Context/JourneyContext";
import { calculateDistanceAndDuration } from "../../../Utility/DistanceCalculator";

const CabSearch = ({
  resClass,
  setSearchBarOpen,
  searchBarOpen,
  source,
  destination,
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  startDate,
  setStartDate,
  returnDate,
  setReturnDate,
  setStartTime,
  returnTime,
  startTime,
}) => {
  const handleTripTypeChange = (e) => {
    setSelectedValue(e.target.value);
  };
  const { journeyData, setJourneyData } = useContext(AppContext);

  const updateChanges = () => {
    calculateDistanceAndDuration(
      source,
      destination,
      selectedValue,
      journeyData,
      setJourneyData, 
      startDate,
      returnDate,
      startTime,
      returnTime
    );
    alert("changes Updated")
  };

  const fromInputRef = useRef();
  const toInputRef = useRef();

  useAutocomplete(fromInputRef, setSource);
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
                defaultValue={source}
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
                <DatePickerComponent
                  startDate={startDate}
                  setStartDate={setStartDate}
                  newClass={true}
                />
              </div>
            </div>
          </div>

          {selectedValue === "Outstation Round-Trip" ? (
            <div className="col">
              <div className="form-group">
                <label className="font-xs-white">Return Date</label>
                <div className="input-group customdate">
                  <DatePickerComponent
                    startDate={returnDate}
                    setStartDate={setReturnDate}
                    newClass={true}
                  />
                </div>
              </div>
            </div>
          ) : null}
          <div id="dropdate" className="col">
            <div className="form-group">
              <label className="font-xs-white">Pickup Time</label>
              <div className="input-group">
                {/* <DatePickerComponent setStart={setStartDate} start={startDate} />
                 */}
                <TimePickerComponent updateTimeCallback={setStartTime} />
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
