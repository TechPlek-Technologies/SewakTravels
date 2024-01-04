import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import { useRef } from "react";
import useAutocomplete from "../../../../Utility/Autocomplete";

const OutStationSearch = ({
  source,destination,
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  startDate,
  setStartDate,
  returnDate,
  setReturnDate,
  setStartTime,
  setReturnTime,
}) => {

  
  const sourceInputRef = useRef(null);
  const destinationInputRef = useRef(null);

  useAutocomplete(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);

  const additionalClass =
    selectedValue === "Outstation Round-Trip" ? "sixColumnSearch" : "";

  return (
    <div className={`left-part row ${additionalClass}`}>
      <div className="search-body title-hotel col-2 hoverbox">
        <h6>{"From"}</h6>

        <input
          type="text"
          name="outstationSource"
          placeholder={source}
          className="form-control"
          id="outstationSourceField"
          ref={sourceInputRef}
        />
      </div>
      <div className="search-body title-hotel col-2">
        <h6>{"To"}</h6>
        <input
          type="text"
          name="outStationDestination"
          placeholder={destination}
          className="form-control "
          ref={destinationInputRef}
        />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Pickup Date"}</h6>
        <DatePickerComponent
          startDate={startDate}
          setStartDate={setStartDate}
        />
      </div>

      <div className="search-body col-2 search-input">
        <h6>{"Pickup Time"}</h6>
        <TimePickerComponent updateTimeCallback={setStartTime} />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Return Date"}</h6>
        {selectedValue === "Outstation Round-Trip" ? (
          <DatePickerComponent
            startDate={returnDate}
            setStartDate={setReturnDate}
          />
        ) : (
          <div className="clickToAdd">
            <h6  onClick={() => setSelectedValue("Outstation Round-Trip")}>
            click to add
          </h6>
            </div>
        )}
      </div>
      {selectedValue === "Outstation Round-Trip" ? (
        <div className="search-body col-2 search-input">
          <h6>{"Drop Time"}</h6>
          <TimePickerComponent updateTimeCallback={setReturnTime} />
        </div>
      ) : null}
    </div>
  );
};

export default OutStationSearch;
