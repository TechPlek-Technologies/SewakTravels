import React, { useState } from "react";
import { carData, carTypeData } from "../../../Data/CabData";
import renderFiltersByType from "../../../HOC/renderFiltersByType";

function Filters({ setShowFilter, showFilter, setFilteredData}) {
  const [show, setShow] = useState(false);

  return (
    <div className="left-sidebar" style={{ left: showFilter ? "-1px" : "" }}>
      <div className="back-btn" onClick={() => setShowFilter(!showFilter)}>
        back
      </div>

      <div className={`middle-part collection-collapse-block ${show ? "" : "open"}`}>
        <>
          <div className="d-flex align-items-center justify-content-between">
            <h5>Latest Filter</h5>
            <img  src="/assets/images/icon/adjust.png" className="img-fluid" alt="" />
          </div>
          <div onClick={() => setShow(!show)} className={`collection-collapse-block-content ${show ? "hide-content" : ""}`}>
            {renderFiltersByType(setFilteredData)}
            {/* {renderCarTypeFilterOptions(carTypeData, selectedCarTypes, handleCarTypeSelection)} */}
          </div>
        </>
      </div>
    </div>
  );
}

export default Filters;

// Function to render car type filter options based on carTypeData and selected car types
function renderCarTypeFilterOptions(carTypeData, selectedCarTypes, handleCarTypeSelection) {
  return (
    <div>
      {carTypeData?.map((item) => (
        <div key={item.id}>
          <label>
            <input
              type="checkbox"
              checked={selectedCarTypes.includes(item.type)}
              onChange={() => handleCarTypeSelection(item.type)}
            />
            {item.type}
          </label>
        </div>
      ))}
    </div>
  );
}
