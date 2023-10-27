import { Fragment, useEffect, useRef, useState } from "react";
import DatePickerComponent from "../../Common/DatePickerComponent";
import TimePickerComponent from "../../Common/TimePickerComponent";


function CabSearch({setPickup,setDestination}) {


  const [startDate, setStartDate] = useState(new Date());



// Start of google place API
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
    const pickup=place.name.trim().replace(/\s+/g, '_')
    setPickup(pickup);
  });

  toAutoCompleteRef.current.addListener("place_changed", async function () {
    const place = await toAutoCompleteRef.current.getPlace();
    const destination=place.name.trim().replace(/\s+/g, '_')
    setDestination(destination);
  });

  
}, []);

// END



  return (
    <Fragment>
      <form onSubmit={(event) => event.preventDefault()}>
        <div className="form-group">
          <input
            type="email"
            className="form-control"
            id="exampleInputEmail1"
            placeholder="from"
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
            type="email"
            className="form-control"
            id="exampleInputEmail"
            placeholder="to"
            ref={toInputRef}
          />
          <img
            src="/assets/images/icon/location.png"
            className="img-fluid"
            alt=""
          />
        </div>
        <div className="form-group row cab-modern-form">
          <div className="col form-control" >
            <DatePickerComponent setStart={setStartDate} start={startDate} />
          </div>
          <div className="col">
            <TimePickerComponent />
          </div>
        </div>
      </form>
      <form className="radio-form" onSubmit={(event) => event.preventDefault()}>
        <input
          id="radio-1"
          type="radio"
          name="gender"
          value="in city"
          defaultChecked
        />
        <label htmlFor="radio-1" className="radio-label">
          in city
        </label>
        <input id="radio-2" type="radio" name="gender" value="out of city" />
        <label htmlFor="radio-2" className="radio-label">
          out of city
        </label>
      </form>
    </Fragment>
  );
}

export default CabSearch;
