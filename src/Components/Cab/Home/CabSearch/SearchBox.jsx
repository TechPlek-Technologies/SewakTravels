import AirportSearch from "./AirportSearch";
import RentalSearch from "./RentalSearch";
import OutStationSearch from "./OutStationSearch";

const SearchBox = ({
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  setStartDate,
  setReturnDate,
  setStartTime,
  setReturnTime
}) => {
  const handleRadioChange = (event) => {
    console.log("Selected Value: ", event.target.value);
    console.log("local state :", selectedValue);
    setSelectedValue(event.target.value);
  };

  return (
    <>
      <div className={`search-box `}>
        <div className="journeyType ">
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

          <div>
            <input
              id="radio-4"
              type="radio"
              name="journeyType"
              value="Hourly Rentals"
              onChange={handleRadioChange}
              onClick={() => setSelectedValue("Hourly Rentals")}
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
            setSource={setSource}
            setDestination={setDestination}
            selectedValue={selectedValue}
            setSelectedValue={setSelectedValue}
            setStartDate={setStartDate}
            setReturnDate={setReturnDate}
            setStartTime={setStartTime}
            setReturnTime={setReturnTime}
          />
        ) : selectedValue === "Airport Transfer" ? (
          <AirportSearch
            setSource={setSource}
            setDestination={setDestination}
          />
        ) : (
          <RentalSearch setSource={setSource} setDestination={setDestination} />
        )}
      </div>
    </>
  );
};

export default SearchBox;
