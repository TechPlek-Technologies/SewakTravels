import React, { useState, useEffect } from "react";
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

  useEffect(() => {
    // Use the selectedLabels to filter data and perform your filtering logic here
    // For example, you can filter your data based on the selected labels and update the results accordingly.
    // You can also pass the selectedLabels up to the parent component for global filtering.
     // Function to apply filtering logic
 
    if (selectedLabels.length === 0) {
      console.log(carData)
      setFilteredData(carData); // No filtering, return all data
    }else{
      const newFilteredData=carData.filter((item) => selectedLabels.includes(item.category))
      
      console.log(newFilteredData)
      // Filter the carData based on selected car types
     setFilteredData(newFilteredData);
    }
    
  
    console.log("Selected Labels: ", selectedLabels);
  }, [selectedLabels]);

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
          className={`collection-collapse-block-content ${!show ? "d-none" : ""} `}
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
