import { useState } from "react";
import { useRef } from "react";
import useAutocomplete from "../../Utility/Autocomplete";
import OutStationSearch from "../Cab/Home/BannerSearch/OutStationSearch";
import AirportSearch from "../Cab/Home/BannerSearch/AirportSearch";
import RentalSearch from "../Cab/Home/BannerSearch/RentalSearch";

const SearchBox = () => {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const [startDate, setStartDate] = useState(tomorrow);
  const [returnDate, setReturnDate] = useState(dayAfterTomorrow);
  const [selectedValue, setSelectedValue] = useState("Outstation One-Way"); // Set the initial selected value
  const [source, setSource] = useState("");
  const [destination, setDestination] = useState("");
  const sourceInputRef = useRef();
  const destinationInputRef = useRef();

  useAutocomplete(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);

  const handleRadioChange = (event) => {
    setSelectedValue(event.target.value);
    // Update the selected value when a radio button is changed
  };

  return (
    <>
      <div className={`search-box `}>
        <div className="journeyType responsive-btn">
          <div>
            <input
              id="radio-1"
              type="radio"
              name="journeyType"
              value="Outstation One-Way"
              onChange={handleRadioChange}
              checked={selectedValue === "Outstation One-Way"}
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
        </div>

        {selectedValue === "Outstation One-Way" ||
        selectedValue === "Outstation Round-Trip" ? (
          <OutStationSearch
            sourceInputRef={sourceInputRef}
            destinationInputRef={destinationInputRef}
            startDate={startDate}
            setStartDate={setStartDate}
            selectedValue={selectedValue}
            setSelectedValue={setSelectedValue}
            returnDate={returnDate}
            setReturnDate={setReturnDate}
            source={source}
            destination={destination}
            setSource={setSource}
            setDestination={setDestination}
          />
        ) : selectedValue === "Airport Transfer" ? (
          <AirportSearch
            sourceInputRef={sourceInputRef}
            destinationInputRef={destinationInputRef}
            startDate={startDate}
            setStartDate={setStartDate}
            selectedValue={selectedValue}
            setSelectedValue={setSelectedValue}
            returnDate={returnDate}
            setReturnDate={setReturnDate}
            source={source}
            destination={destination}
            setSource={setSource}
            setDestination={setDestination}
          />
        ) :(<RentalSearch sourceInputRef={sourceInputRef}
          destinationInputRef={destinationInputRef}
          startDate={startDate}
          setStartDate={setStartDate}
          selectedValue={selectedValue}
          setSelectedValue={setSelectedValue}
          returnDate={returnDate}
          setReturnDate={setReturnDate}
          source={source}
          destination={destination}
          setSource={setSource}
          setDestination={setDestination}
          />)
          }
      </div>
    </>
  );
};

export default SearchBox;
