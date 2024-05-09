import React, { useState } from "react";

const CabRoute1 = ({source}) => {

    const [activeCarType, setActiveCarType] = useState('sedan');


    const handleCarTypeClick = (carType) => {
        setActiveCarType(carType);
    };

    const cabTypeData = [
      { cab: "SEDAN", images: "/assets/img/cabs/sedan.png" },
      { cab: "SUV", images: "/assets/img/cabs/SUV.png" },
      { cab: "PRIME SUV", images: "/assets/img/cabs/prime-suv.png" },
  ];

  return (
    <div id="for-md-sm-devices" className="container">
      <div className="row">
        <div className="col">
          <h1 className="mb-1">Top Cab Routes from {source}</h1>
        </div>
      </div>
      <div className="row">
        <div className="col">
          <p>Select type to update price, included kms & extra fare</p>
        </div>
      </div>
      <div className="row border-bottom border-info">
        {cabTypeData.map((carType) => (
          <div
            key={carType.cab}
            className={`col d-flex flex-column align-items-center ${
              activeCarType === carType.cab && "active-bottom-border"
            }`}
            onClick={() => handleCarTypeClick(carType.cab)}
          >
            <img
              className={activeCarType === carType.cab && "active-car-type"}
              src={carType.images}
              alt={carType.cab}
            />
            <span className="my-2">{carType?.cab?.toUpperCase()}</span>
          </div>
        ))}
      </div>
    </div>
  );
};

export default CabRoute1;
