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
          <div className="left-part">
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
            <div className="search-body">
              <h6>{"Departure"}</h6>
              <DatePickerComponent
                startDate={new Date(startDate)}
                setStartDate={setStartDate}
              />
            </div>
            <div className="search-body">
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
