import React, { useState, useEffect, useCallback } from "react";
import { carData, carTypeData } from "../../../../Data/CabData";

function CabType({setFilteredData}) {
  const [show, setShow] = useState(true);
  const [selectedLabels, setSelectedLabels] = useState([]); // State to store selected labels

  // Function to handle label selection
  const handleLabelSelection = (label) => {
    if (selectedLabels.includes(label)) {
      setSelectedLabels(selectedLabels.filter((selectedLabel) => selectedLabel !== label));
    } else {
      setSelectedLabels([...selectedLabels, label]);
    }
  };

  const applyFiltering = useCallback(() => {
    if (selectedLabels.length === 0) {
      setFilteredData(carData); // No filtering, return all data
    } else {
      const newFilteredData = carData.filter((item) => selectedLabels.includes(item.category));

      // Filter the carData based on selected car types
      setFilteredData(newFilteredData);
    }
  }, [selectedLabels, setFilteredData]);

  // Call the memoized filtering function initially
  useEffect(() => {
    applyFiltering();
  }, [applyFiltering]);


  return (
    <div className="filter-block">
      <div
        className={`collection-collapse-block ${show ? "open" : ""}`}
        onClick={() => {
          setShow(!show);
        }}
      >
        <h6 className="collapse-block-title">Cab Type</h6>
        <div
          className={`collection-collapse-block-content  `}
        >
          <div className="collection-brand-filter">
            {carTypeData.map((data, index) => {
              const isChecked = selectedLabels.includes(data.type);
              return (
                <div
                  className="form-check collection-filter-checkbox"
                  key={index}
                >
                  <input
                    type="checkbox"
                    className="form-check-input"
                    id={data.type}
                    value={data.type}
                    checked={isChecked}
                    onChange={() => handleLabelSelection(data.type)} // Handle label selection/deselection
                  />
                  <label className="form-check-label" htmlFor={data.type}>
                    {data.type}
                  </label>
                </div>
              );
            })}
          </div>
        </div>
      </div>
    </div>
  );
}

export default CabType;
