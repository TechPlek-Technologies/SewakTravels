import CabSearch from "@/components/common/search/cab-search";
import { CabContext } from "@/context/CabContext";
import { FC, useContext, useState } from "react";

const Search: FC = () => {
  const [searchBarOpen, setSearchBarOpen] = useState(false);
  
  const context= useContext(CabContext);
  console.log(context);
  
  return (
    <div className="bg-inner small-section pb-0">
      <div className="container">
        <div className="flight-search">
          <div className="responsive-detail">
            <div className="destination">
              <span>drop loaction</span>
              <span>
                <i className="fas fa-long-arrow-alt-right"></i>
              </span>
              <span>pickup location</span>
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
          </div>
          <CabSearch resClass="res-cab" setSearchBarOpen={setSearchBarOpen} searchBarOpen={searchBarOpen} />
        </div>
      </div>
    </div>
  );
};

export default Search;
