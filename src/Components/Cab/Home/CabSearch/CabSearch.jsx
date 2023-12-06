import SearchBox from "./SearchBox";

const CabSearch = ({
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
  setRentals
}) => {
  return (
    <div className="search-panel">
      <div className="container">
        <div className="row searchRow">
          <div className="col-xl-10 ">
            <div className="search-panel shadow" id="searchBar">
              <div className="search-section ">
                <SearchBox
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
                  setRentals={setRentals}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
export default CabSearch;
