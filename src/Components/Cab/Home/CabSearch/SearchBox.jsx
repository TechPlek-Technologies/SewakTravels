import AirportSearch from "./AirportSearch";
import RentalSearch from "./RentalSearch";
import OutstationDataState from "../../../../Hooks/OutstationDataState";
import OutStationSearch from "./OutStationSearch";

const SearchBox = () => {
  const { selectedValue,setSelectedValue} = OutstationDataState();

  const handleRadioChange=(event)=>{
    setSelectedValue(event.target.value)
  }

  console.log("Rendering with selectedValue:", selectedValue);


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
            <OutStationSearch selectedValue={selectedValue}/>
          ) : selectedValue === "Airport Transfer" ? (
          <AirportSearch />
        ) : (
          <RentalSearch />
        )}
      </div>
    </>
  );
};

export default SearchBox;
