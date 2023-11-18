import SearchBox from "../../../Common/SearchBox";

const SearchComponent= () => {
    
    return (
      <div className="search-panel">
        <div className="container">
          <div className="row">
            <div className="col-xl-10 ">
              <div className="search-panel shadow" id="searchBar">
                
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
  export default SearchComponent;