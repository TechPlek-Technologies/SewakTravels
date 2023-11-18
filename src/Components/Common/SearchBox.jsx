import { useState } from "react";
import DatePickerComponent from "./DatePickerComponent";
import TimePickerComponent from "./TimePickerComponent";
import { useRef } from "react";
import useAutocomplete from "../../Utility/Autocomplete";

const SearchBox = () => {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const [startDate, setStartDate] = useState(tomorrow);
  const [returnDate, setReturnDate] = useState(dayAfterTomorrow);
  const [selectedValue, setSelectedValue] = useState("Outstation one-way"); // Set the initial selected value
  const [source, setSource] = useState("");
  const [destination, setDestination] = useState("");
  const sourceInputRef = useRef();
  const destinationInputRef = useRef();

  useAutocomplete(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);

  const handleRadioChange = (event) => {
    console.log(selectedValue);
    setSelectedValue(event.target.value);
    console.log(selectedValue);
    // Update the selected value when a radio button is changed
  };

  return (
    <>
      <div className={`search-box `}>
        <div className="journeyType">
          <div>
            <input
              id="radio-1"
              type="radio"
              name="journeyType"
              value="Outstation one-way"
              onChange={handleRadioChange}
              checked={selectedValue === "Outstation one-way"}
            />
            <label htmlFor="radio-1" className="radio-label">
              Outstation One-Way
            </label>
          </div>
          <div>
            <input
              id="radio-2"
              type="radio"
              name="journeyType"
              onChange={handleRadioChange}
              checked={selectedValue === "Outstation Round-Trip"}
              value="Outstation Round-Trip"
            />
            <label htmlFor="radio-2" className="radio-label">
              Outstation Round-Trip
            </label>
          </div>
          <div>
            <input
              id="radio-3"
              type="radio"
              name="journeyType"
              value="Hourly Rentals"
              checked={selectedValue === "Hourly Rentals"}
              onChange={handleRadioChange}
            />
            <label htmlFor="radio-3" className="radio-label">
              Hourly Rentals
            </label>
          </div>
          <div>
            <input
              id="radio-4"
              type="radio"
              name="journeyType"
              value="Airport Transfer"
              checked={selectedValue === "Airport Transfer"}
              onChange={handleRadioChange}
            />
            <label htmlFor="radio-4" className="radio-label">
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
            <h6>{"Departure"}</h6>
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

       
      </div>
    </>
  );
};

export default SearchBox;
