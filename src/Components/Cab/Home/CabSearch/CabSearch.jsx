import SearchBox from "./SearchBox";

const CabSearch = ({
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  setStartDate,
  setReturnDate,
  setStartTime,
  setReturnTime,
}) => {
  return (
    <div className="search-panel">
      <div className="container">
        <div className="row searchRow">
          <div className="col-xl-10 ">
            <div className="search-panel shadow" id="searchBar">
              <div className="search-section ">
                <SearchBox
                  setSource={setSource}
                  setDestination={setDestination}
                  selectedValue={selectedValue}
                  setSelectedValue={setSelectedValue}
                  setStartDate={setStartDate}
                  setReturnDate={setReturnDate}
                  setStartTime={setStartTime}
                  setReturnTime={setReturnTime}
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
