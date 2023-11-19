import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import useAutocomplete from "../../../../Utility/Autocomplete";

const OutStationSearch = ({
  sourceInputRef,
  destinationInputRef,
  startDate,
  setStartDate,
  selectedValue,
  setSelectedValue,
  returnDate,
  setReturnDate,
  setSource,
  setDestination
}) => {
  useAutocomplete(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);
  return (
    <div className="left-part row">
      <div className="search-body title-hotel col-2">
        <h6>{"From"}</h6>
        <input
          type="text"
          name="text"
          placeholder="source"
          className="form-control "
          ref={sourceInputRef}
        />
      </div>
      <div className="search-body title-hotel col-2">
        <h6>{"to"}</h6>
        <input
          type="text"
          name="text"
          placeholder="destination"
          className="form-control "
          ref={destinationInputRef}
        />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"pickup date"}</h6>
        <DatePickerComponent start={startDate} setStart={setStartDate} />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Return"}</h6>
        {selectedValue === "Outstation Round-Trip" ? (
          <DatePickerComponent start={returnDate} setStart={setReturnDate} />
        ) : (
          <h6 onClick={() => setSelectedValue("Outstation Round-Trip")}>
            Tap to add a return date
          </h6>
        )}
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"pickup-Time"}</h6>
        <TimePickerComponent />
      </div>
    </div>
  );
};

export default OutStationSearch;
