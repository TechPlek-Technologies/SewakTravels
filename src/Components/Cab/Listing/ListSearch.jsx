import { useState } from "react";

function ListSearch() {
    const [searchBarOpen, setSearchBarOpen] = useState(false)
    const style={
        "display": "flex",
        "justify-content": "space-around",
        "font-size": "large"
    }
    return (
      <div className="bg-inner small-section pb-0"  >
        <div className="container">
          <div className="flight-search" style={style}>
              <div className="destination">
                <span>paris</span>
                <span>
                  <i className="fas fa-long-arrow-alt-right"></i>
                </span>
                <span>Toulouse</span>
              </div>
              <div className="details">
                <span>02:05, 19-Aug-2023</span>
                <span className="divider">|</span>
                <span>2 Adults</span>
              </div>
              <div className="modify-search">
                <a href="#" className="btn btn-solid color1"  onClick={()=>setSearchBarOpen(!searchBarOpen)}>
                  modify search
                </a>
              </div>
            {/* <CabSearch resClass="res-cab" setSearchBarOpen={setSearchBarOpen} searchBarOpen={searchBarOpen} /> */}
          </div>
        </div>
      </div>
    );
  };
  
  export default ListSearch;