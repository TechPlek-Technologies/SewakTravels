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
       style={selectedValue === "Outstation Round-Trip" ? { width: "100px" } : null}
       type="text"
       name="text"
       placeholder="source"
       className="form-control"
       ref={sourceInputRef}
     />
     
      </div>
      <div className="search-body title-hotel col-2">
        <h6>{"To"}</h6>
        <input
       style={selectedValue === "Outstation Round-Trip" ? { width: "130px" } : null}

          type="text"
          name="text"
          placeholder="destination"
          className="form-control "
          ref={destinationInputRef}
        />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Pickup Date"}</h6>
        <DatePickerComponent start={startDate} setStart={setStartDate} 
        />
      </div>
     
      <div className="search-body col-2 search-input">
        <h6>{"Pickup Time"}</h6>
        <TimePickerComponent />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Return Date"}</h6>
        {selectedValue === "Outstation Round-Trip" ? (
          <DatePickerComponent start={returnDate} setStart={setReturnDate} />
        ) : (
          <h6 onClick={() => setSelectedValue("Outstation Round-Trip")}>
            Tap to add a return date
          </h6>
        )}
      </div>
      {
        selectedValue==="Outstation Round-Trip"?(
          <div className="search-body col-2 search-input">
        <h6>{"Drop Time"}</h6>
        <TimePickerComponent />
      </div>
        ):null
      }
   
    </div>
  );
};

export default OutStationSearch;
