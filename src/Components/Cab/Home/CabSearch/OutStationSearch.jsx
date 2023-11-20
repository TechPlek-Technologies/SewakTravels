import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import OutstationDataState from "../../../../Hooks/OutstationDataState";

const OutStationSearch = ({selectedValue,setSelectedValue}) => {

  const {
    startDate,
    returnDate,
    setStartDate,
    setReturnDate,
    setTime,
    sourceInputRef,
    destinationInputRef,
  } = OutstationDataState();
  console.log("Rendering with selectedValue:", selectedValue);

  return (
    <div className="left-part row">
      <div className="search-body title-hotel col-2">
        <h6>{"From"}</h6>

        <input
          type="text"
          name="outstationSource"
          placeholder="source"
          className="form-control"
          ref={sourceInputRef}
        />
      </div>
      <div className="search-body title-hotel col-2">
        <h6>{"To"}</h6>
        <input

          type="text"
          name="outStationDestination"
          placeholder="destination"
          className="form-control "
          ref={destinationInputRef}
        />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Pickup Date"}</h6>
        <DatePickerComponent startDate={new Date(startDate)} setStartDate={setStartDate} />
      </div>

      <div className="search-body col-2 search-input">
        <h6>{"Pickup Time"}</h6>
        <TimePickerComponent updateTimeCallback={setTime} />
      </div>
      <div className="search-body col-2 search-input">
        <h6>{"Return Date"}</h6>
        {selectedValue === "Outstation Round-Trip" ? (
          <DatePickerComponent startDate={new Date(returnDate)} setStartDate={setReturnDate} />
        ) : (
          <h6 onClick={() => setSelectedValue("Outstation Round-Trip")}>
            Tap to add a return date
          </h6>
        )}
      </div>
      {/* {
        selectedValue==="Outstation Round-Trip"?(
          <div className="search-body col-2 search-input">
        <h6>{"Drop Time"}</h6>
        <TimePickerComponent />
      </div>
        ):null
      } */}
    </div>
  );
};

export default OutStationSearch;
