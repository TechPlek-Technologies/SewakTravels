import TimePickerComponent from "../../../Common/TimePickerComponent";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import OutstationDataState from "../../../../Hooks/OutstationDataState";

const RentalSearch = () => {
  const { startDate, setStartDate, sourceInputRef } = OutstationDataState();

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
              <select className="form-control">
                <option value="1hrs10km">1hrs 10km</option>
                <option value="2hrs20km">2hrs 20km</option>
                <option value="3hrs30km">3hrs 30km</option>
                <option value="4hrs40km">4hrs 40km</option>
                <option value="5hrs50km">5hrs 50km</option>
                <option value="6hrs60km">6hrs 60km</option>
                <option value="7hrs70km">7hrs 70km</option>
                <option value="8hrs80km">8hrs 80km</option>
                <option value="9hrs90km">9hrs 90km</option>
                <option value="10hrs100km">10hrs 100km</option>
                <option value="11hrs110km">11hrs 110km</option>
                <option value="12hrs120km">12hrs 120km</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RentalSearch;
