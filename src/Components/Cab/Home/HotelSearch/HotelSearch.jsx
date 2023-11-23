import SearchHotel from "./SearchHotel";

const HotelSearch = () => {
  return (
    <div className="search-panel">
      <div className="container">
        <div className="row">
          <div className="col-xl-10 ">
            <div className="search-panel shadow" id="searchBar">
              <div className="search-section ">
                <SearchHotel />
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </div>
  );
  };
  export default HotelSearch;
  