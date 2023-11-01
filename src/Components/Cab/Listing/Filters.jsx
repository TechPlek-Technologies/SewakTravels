import React, { useState } from "react";
import { carData, carTypeData } from "../../../Data/CabData";
import renderFiltersByType from "../../../HOC/renderFiltersByType";

function Filters({ setShowFilter, showFilter, updateFilteredMenu, data }) {
  const [show, setShow] = useState(false);

  // State to store selected car types
  const [selectedCarTypes, setSelectedCarTypes] = useState([]);

  // Function to update selected car types and trigger filtering
  const handleCarTypeSelection = (carType) => {
    const isSelected = selectedCarTypes.includes(carType);

    // If the car type is selected, remove it; otherwise, add it
    if (isSelected) {
      setSelectedCarTypes(selectedCarTypes.filter((selectedCarType) => selectedCarType !== carType));
    } else {
      setSelectedCarTypes([...selectedCarTypes, carType]);
    }

    // Apply filtering logic based on selected car types and update the parent component
    const newFilteredMenu = applyFiltering(selectedCarTypes);
    updateFilteredMenu(newFilteredMenu);

  };

  // Function to apply filtering logic
  const applyFiltering = (selectedCarTypes) => {
    if (selectedCarTypes.length === 0) {
      return carData; // No filtering, return all data
    }
console.log(carData.filter((item) => selectedCarTypes.includes(item.category)))
    // Filter the carData based on selected car types
    return carData.filter((item) => selectedCarTypes.includes(item.category));
  };

  return (
    <div className="left-sidebar" style={{ left: showFilter ? "-1px" : "" }}>
      <div className="back-btn" onClick={() => setShowFilter(!showFilter)}>
        back
      </div>

      <div className={`middle-part collection-collapse-block ${show ? "" : "open"}`}>
        <>
          <div className="d-flex align-items-center justify-content-between">
            <h5>Latest Filter</h5>
            <img src="/assets/images/icon/adjust.png" className="img-fluid" alt="" />
          </div>
          <div onClick={() => setShow(!show)} className={`collection-collapse-block-content ${show ? "hide-content" : ""}`}>
            {renderFiltersByType()}
            {renderCarTypeFilterOptions(carTypeData, selectedCarTypes, handleCarTypeSelection)}
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
