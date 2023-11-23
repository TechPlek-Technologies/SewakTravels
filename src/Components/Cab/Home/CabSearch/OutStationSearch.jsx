import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import OutstationDataState from "../../../../Hooks/OutstationDataState";

const OutStationSearch = ({setSource,setDestination,selectedValue,setSelectedValue}) => {

  const {
    source,
    destination,
    startDate,
    returnDate,
    setStartDate,
    setReturnDate,
    setTime,
    sourceInputRef,
    destinationInputRef,
  } = OutstationDataState();

  console.log("Rendering with selectedValue:", selectedValue);
  console.log("source:", source);
  setSource(source)
  console.log("destination:", destination);
  setDestination(destination)
  const additionalClass = selectedValue === 'Outstation Round-Trip' ? 'sixColumnSearch' : '';

 
  return (
   <div className={`left-part row ${additionalClass}`}>
      <div className="search-body title-hotel col-2">
        <h6>{"From"}</h6>

        <input
          type="text"
          name="outstationSource"
          placeholder="Source"
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
          placeholder="Destination"
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
            click to add
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
