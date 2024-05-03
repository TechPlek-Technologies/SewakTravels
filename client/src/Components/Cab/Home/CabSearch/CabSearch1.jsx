import SearchBox from "./SearchBox";

const CabSearch1 = ({
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
    <div className=" home-content mix-layout smaller-content">
      <div className="bg-transparent">
        <div id="sticky_cls">
          <div className="search-panel">
            <h2 className="title-top text-white">{"Book Cabs with Sewak Travels"}</h2>
            <div className="search-section">
              <SearchBox classRound="rounded10"
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
  );
};

export default CabSearch1;
