import React, { useState } from "react";

const CabRoute = ({source}) => {

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
    
      <div id="for-md-to-lg-devices" className="mb-4">
        <h1 className="mb-4">Top Cab Routes from {source}</h1>

        <div className="d-flex align-items-center">
          <div className="d-flex flex-column pr-2">
            <p className="mb-1">Select type</p>
            <p>To update price, included kms & extra fare</p>
          </div>

          <ul className="d-flex">
            {cabTypeData.map((carType) => (
              <li key={carType.cab} onClick={() => handleCarTypeClick(carType.cab)}>
                <span
                  className={`cabTap ${
                    activeCarType === carType.cab && "activeCheck"
                  }`}
                ></span>
                <span>
                  <img
                    className={activeCarType === carType.cab && "active-car-type"}
                    src={carType.images}
                    alt={carType.cab}
                  />
                </span>
                <span className="mx-md-3 font-weight-bolder">
                  {carType?.cab?.toUpperCase()}
                </span>
                <span
                  className={`circle-outer ${
                    activeCarType === carType.cab && "circle-outer-active"
                  }`}
                >
                  <span
                    className={activeCarType === carType.cab && "circle-inner"}
                  ></span>
                </span>
              </li>
            ))}
          </ul>
        </div>
      </div>
   
  );
};

export default CabRoute;
