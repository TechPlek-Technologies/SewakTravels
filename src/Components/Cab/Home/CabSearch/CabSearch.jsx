import SearchBox from "./SearchBox";

const CabSearch= ({setSource1,setDestination1}) => {
    
    return (
      <div className="search-panel">
        <div className="container">
          <div className="row searchRow">
            <div className="col-xl-10 ">
              <div className="search-panel shadow" id="searchBar">
                <div className="search-section ">
                  <SearchBox setSource1={setSource1} setDestination1={setDestination1} />
                </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  export default CabSearch;