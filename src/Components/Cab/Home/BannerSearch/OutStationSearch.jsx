import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import { useRef } from "react";
import { useEffect } from "react";
import { Fragment } from "react";

const OutStationSearch = ({
  setPickup,
  setDestination,
  setPickupDate,
  setPickupTime,
  pickupDate,
  handleRadioChange,
  selectedValue,
}) => {
  const fromAutoCompleteRef = useRef();
  const toAutoCompleteRef = useRef();
  const fromInputRef = useRef();
  const toInputRef = useRef();

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
      const pickup = place.name.trim();
      setPickup(pickup);
    });

    toAutoCompleteRef.current.addListener("place_changed", async function () {
      const place = await toAutoCompleteRef.current.getPlace();
      const destination = place.name.trim();
      setDestination(destination);
    });
  }, []);

  // END

  return (
    <Fragment>
      <form id="outStationSearch" onSubmit={(event) => event.preventDefault()}>
        <div className="form-group">
          <input
            type="text"
            className="form-control"
            id="exampleInputEmail1"
            placeholder="Source"
            ref={fromInputRef}
          />
          <img
            src="/assets/images/icon/from.png"
            className="img-fluid"
            alt=""
          />
        </div>
        <div className="form-group">
          <input
            type="text"
            className="form-control"
            id="exampleInputEmail"
            placeholder="Destination"
            ref={toInputRef}
          />
          <img
            src="/assets/images/icon/location.png"
            className="img-fluid"
            alt=""
          />
        </div>
        <div className="form-group row cab-modern-form">
          <div className="col form-control">
            <DatePickerComponent setStart={setPickupDate}/>
          </div>
          <div className="col">
            <TimePickerComponent setPickupTime={setPickupTime}/>
          </div>
        </div>
      </form>
      <form className="radio-form" onSubmit={(event) => event.preventDefault()}>
        <input
          id="radio-1"
          type="radio"
          name="gender"
          value="One Way"
          onChange={handleRadioChange}
          defaultChecked={selectedValue === "One Way"}
        />
        <label htmlFor="radio-1" className="radio-label">
          One Way
        </label>
        <input
          id="radio-2"
          type="radio"
          name="gender"
          value="RoundTrip"
          onChange={handleRadioChange}
          defaultChecked={selectedValue === "Round Trip"}
        />
        <label htmlFor="radio-2" className="radio-label">
          Round Trip
        </label>
      </form>
    </Fragment>
  );
};

export default OutStationSearch;
