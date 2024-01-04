import SearchBox from "./SearchBox";


const SearchHotel = () => {
  return (
    <div className="search-panel">
      <div className="container">
        <div className="row">
          <div className="col-xl-10 ">
            <div className="search-panel " id="searchBar">
              <div className="search-section ">
                <SearchBox />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
export default SearchHotel;
