import { useRef, useState } from "react";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import TimePickerComponent from "../../../Common/TimePickerComponent";
import useAutocomplete from "../../../../Utility/Autocomplete";
import useAutocompleteFlight from "../../../../Utility/AutoCompleteFlight";
// import useAutocomplete from "../../../../Utility/AutoCompleteFlight";


const AirportSearch = ({setSource,setDestination,startDate,setStartDate,setStartTime}) => {

 
  const sourceInputRef = useRef(null);
  const destinationInputRef = useRef(null);

  useAutocompleteFlight(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);
 




  const [pickupType, setPickupType] = useState("fromAirport");

  const handlePickupTypeChange = (event) => {
    setPickupType(event.target.value);
  };

  return (
    <div className="left-part row">
      <div className="search-body title-hotel col-2">
        <h6>{"Pickup Type"}</h6>
        <select
          // style={{ width: "170px" }}
          className="form-control"
          value={pickupType}
          onChange={(e)=>setPickupType(e.target.value)}
        >
          <option value="fromAirport">From Airport</option>
          <option value="toAirport">To Airport</option>
        </select>
      </div>

      { (
        <>
          <div className="search-body title-hotel col-2">
            <h6>{"Airport"}</h6>
            <input
              // style={{ width: "160px" }}
              type="text"
              name="text"
              placeholder="Select Airport"
              className="form-control"
              ref={sourceInputRef}
            />
          </div>
          <div className="search-body title-hotel col-2">
            <h6>{"City"}</h6>
            <input
              type="text"
              name="text"
              placeholder="Select City"
              className="form-control"
              ref={destinationInputRef}
            />
          </div>
        </>
      )  }

      <div className="search-body col-2 search-input">
        <h6>{"Pickup date"}</h6>
        <DatePickerComponent startDate={new Date(startDate)} setStartDate={setStartDate} />
      </div>

      <div className="search-body col-2 search-input">
        <h6>{"pickup-Time"}</h6>
        <TimePickerComponent  updateTimeCallback={setStartTime}/>
      </div>
    </div>
  );
};

export default AirportSearch;
