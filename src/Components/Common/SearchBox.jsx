import { useState } from "react";
import { Link } from "react-router-dom";
import DatePickerComponent from "./DatePickerComponent";
import TimePickerComponent from "./TimePickerComponent";

const SearchBox = () => {
  const [startDate, setStartDate] = useState(new Date());

  return (
    <>
      <div className={`search-box `}>
        <div className="journeyType">
         
           <div>
           <input
              id="radio-1"
              type="radio"
              name="gender"
              value="Outstation one-way"
              defaultChecked
            />
            <label htmlFor="radio-1" className="radio-label">
              Outstation One-Way
            </label>
           </div>
            <div>
            <input
              id="radio-2"
              type="radio"
              name="gender"
              value="Outstation Round-Trip"
            />
            <label htmlFor="radio-2" className="radio-label">
              Outstation Round-Trip
            </label>
            </div>
            <div>
            <input
              id="radio-2"
              type="radio"
              name="gender"
              value="Rental Hourly"
            />
            <label htmlFor="radio-2" className="radio-label">
              Rental Hourly
            </label>
            </div>
            <div>
            <input
              id="radio-2"
              type="radio"
              name="gender"
              value="Airport Transfer"
            />
            <label htmlFor="radio-2" className="radio-label">
              Airport Transfer
            </label>
            </div>
          
        </div>
        <div className="left-part row">
          <div className="search-body title-hotel col-2">
            <h6>{"From"}</h6>
            <input
              type="text"
              name="text"
              placeholder="source"
              className="form-control "
            />
          </div>
          <div className="search-body title-hotel col-2">
            <h6>{"to"}</h6>
            <input
              style={{ "font-size": "calc(14px + 4*(100vw - 320px)/1600)" }}
              type="text"
              name="text"
              placeholder="destination"
              className="form-control "
            />
          </div>
          <div className="search-body col-2 search-input">
            <h6>{"pick up date"}</h6>
            <DatePickerComponent start={startDate} setStart={setStartDate} />
          </div>
          <div className="search-body col-2 search-input">
            <h6>{"pick up time"}</h6>
            <TimePickerComponent />
          </div>

          
        </div>
      </div>
    </>
  );
};

export default SearchBox;
