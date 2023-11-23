import OutstationDataState from "../../../../Hooks/OutstationDataState";
import DatePickerComponent from "../../../Common/DatePickerComponent";
const TourSearch = () => {
  const {
    startDate,
    returnDate,
    setStartDate,
    setReturnDate,
    sourceInputRef,
    destinationInputRef,
  } = OutstationDataState();
  return (
    <div className="search-panel">
      <div className="search-section">
        <div className="search-box">
        <div className="journeyType ">
          <div>
            <input
              id="radio-1"
              type="radio"
              name="journeyType"
              value="One-Way"
              // onChange={handleRadioChange}
              // checked={selectedValue === "One-Way"}
            />
            <label htmlFor="radio-1" className="radio-label">
             One-Way
            </label>
          </div>

          <div>
            <input
              id="radio-2"
              type="radio"
              name="journeyType"
              // onChange={handleRadioChange}
              // checked={selectedValue === "Round-Trip"}
              value=" Round-Trip"
            />
            <label htmlFor="radio-2" className="radio-label">
              Round-Trip
            </label>
          </div>

        

          
        </div>
          <div className="left-part fourColumnSearch">
            <div className="search-body title-hotel col-2">
              <h6>{"From"}</h6>
              <input
                type="text"
                name="text"
                placeholder="Starting From"
                className="form-control"
                ref={sourceInputRef}
              />
            </div>
            <div className="search-body title-hotel col-2">
              <h6>{"To"}</h6>
              <input
                type="text"
                name="text"
                placeholder="Going To"
                className="form-control "
                ref={destinationInputRef}
              />
            </div>
            <div className="search-body col-2 search-input">
              <h6>{"Departure"}</h6>
              <DatePickerComponent
                startDate={new Date(startDate)}
                setStartDate={setStartDate}
              />
            </div>
            <div className="search-body title-hotel col-2">
              <h6>{"Return"}</h6>
              <DatePickerComponent
                startDate={new Date(returnDate)}
                setStartDate={setReturnDate}
              />
            </div>
            {/* <div className="search-body">
              <h6>{"Traveller"}</h6>
              <SelectTraveler/>
            </div> */}
          </div>
        </div>
      </div>
    </div>
  );
};

export default TourSearch;
