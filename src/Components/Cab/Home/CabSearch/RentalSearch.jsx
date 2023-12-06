import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import OutstationDataState from "../../../../Hooks/OutstationDataState";


const RentalSearch = ({setRentals}) => {
  const { startDate, setStartDate, sourceInputRef } = OutstationDataState();
  
  const handleChange=(e)=>{
    setRentals(e.target.value);
  }

  return (
    <div className="search-panel">
      <div className="search-section">
        <div className="search-box">
          <div className="left-part row fourColumnSearch">
            <div className="search-body title-hotel col-2">
              <h6>{"Source"}</h6>
              <input
                type="text"
                name="text"
                placeholder="Pickup Location"
                className="form-control "
                ref={sourceInputRef}
              />
            </div>

            <div className="search-body col-2 search-input">
              <h6>{"pickup date"}</h6>
              <DatePickerComponent
                startDate={new Date(startDate)}
                setStartDate={setStartDate}
              />
            </div>

            <div className="search-body col-2 search-input">
              <h6>{"pickup Time"}</h6>
              <TimePickerComponent />
            </div>
            <div className="search-body title-hotel col-2">
              <h6>{"Select Package"}</h6>
              <select onChange={handleChange} className="form-control">
                <option value="4hrs40km">4hrs 40km</option>
                <option value="8hrs80km">8hrs 80km</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RentalSearch;
