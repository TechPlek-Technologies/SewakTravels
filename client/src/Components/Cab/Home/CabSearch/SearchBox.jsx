import AirportSearch from "./AirportSearch";
import RentalSearch from "./RentalSearch";
import OutStationSearch from "./OutStationSearch";
import { useState } from "react";

const SearchBox = ({
  source,
  destination,
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  startDate,
  setStartDate,
  returnDate,
  setReturnDate,
  setStartTime,
  setReturnTime,
  setRentals,
}) => {
  const handleRadioChange = (event) => {
    setSelectedValue(event.target.value);
  };

  return (
    <>
      <div className={`search-box `}>
        <div className="journeyType ">
          <div
            onClick={() => setSelectedValue("Outstation One-Way")}
            className={`selectBox ${
              selectedValue === "Outstation One-Way" ? "additionalClass" : ""
            }`}
          >
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

          <div
            onClick={() => setSelectedValue("Outstation Round-Trip")}
            className={`selectBox ${
              selectedValue === "Outstation Round-Trip" ? "additionalClass" : ""
            }`}
          >
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

          <div
            onClick={() => setSelectedValue("Airport Transfer")}
            className={`selectBox ${
              selectedValue === "Airport Transfer" ? "additionalClass" : ""
            }`}
          >
            <input
              id="radio-3"
              type="radio"
              name="journeyType"
              value="Airport Transfer"
              onChange={handleRadioChange}
              checked={selectedValue === "Airport Transfer"}
            />
            <label htmlFor="radio-3" className="radio-label">
              Airport Transfer
            </label>
          </div>

          <div
            onClick={() => setSelectedValue("Hourly Rentals")}
            className={`selectBox ${
              selectedValue === "Hourly Rentals" ? "additionalClass" : ""
            }`}
          >
            <input
              id="radio-4"
              type="radio"
              name="journeyType"
              value="Hourly Rentals"
              onChange={handleRadioChange}
              checked={selectedValue === "Hourly Rentals"}
            />
            <label htmlFor="radio-4" className="radio-label">
              Hourly Rentals
            </label>
          </div>
        </div>

        {selectedValue === "Outstation One-Way" ||
        selectedValue === "Outstation Round-Trip" ? (
          <OutStationSearch
            source={source}
            destination={destination}
            setSource={setSource}
            setDestination={setDestination}
            selectedValue={selectedValue}
            setSelectedValue={setSelectedValue}
            startDate={startDate}
            setStartDate={setStartDate}
            returnDate={returnDate}
            setReturnDate={setReturnDate}
            setStartTime={setStartTime}
            setReturnTime={setReturnTime}
          />
        ) : selectedValue === "Airport Transfer" ? (
          <AirportSearch
            setSource={setSource}
            setDestination={setDestination}
            startDate={startDate}
            setStartDate={setStartDate}
            setStartTime={setStartTime}
          />
        ) : (
          <RentalSearch
            setSource={setSource}
            setDestination={setDestination}
            setRentals={setRentals}
          />
        )}
      </div>
    </>
  );
};

export default SearchBox;
