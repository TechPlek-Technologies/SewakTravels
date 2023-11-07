import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
// import Img from "../../Common/Img";
import { useContext, useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";
import { AppContext } from "../../../Context/JourneyContext";
import { useRef } from "react";
import { useEffect } from "react";
import { calculateDistanceAndDuration } from "../../../Utility/DistanceCalculator";

const CabSearch = ({
  resClass,
  setSearchBarOpen,
  searchBarOpen,
  setPickup,
  setDestination,
  selectedValue,
  destination,
  pickup,
  setValidate
}) => {
  const context = useContext(AppContext);
  const { journeyData, setJourneyData } = context;

  const [startDate, setStartDate] = useState(new Date(journeyData?.pickupDate));

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

  const options = {
    componentRestrictions: { country: "in" },
    fields: ["address_components", "geometry", "icon", "name"],
    types: ["establishment"],
  };

  const fromAutoCompleteRef = useRef();
  const toAutoCompleteRef = useRef();
  const fromInputRef = useRef();
  const toInputRef = useRef();

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
    setValidate(true);
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
                <option value="option1">
                  {journeyData?.tripType||"One Way"}
                </option>
                <option value="option2">
                  One Way
                </option>
                <option value="option3">
                  RoundTrip
                </option>
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
              <label className="font-xs-white">Drop off Location</label>
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
                <DatePickerComponent setStart={setStartDate} />
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
