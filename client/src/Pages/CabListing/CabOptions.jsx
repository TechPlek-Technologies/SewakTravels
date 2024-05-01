import React, { useState } from "react";
import "./CabOptions.css";

function CabOptions() {
  const [activeCarType, setActiveCarType] = useState("sedan");

  const handleCarTypeClick = (carType) => {
    setActiveCarType(carType);
  };

  const cabTypeData = [
    { cab: "SEDAN", images: "/assets/img/sedan.png" },
    { cab: "SUV", images: "/assets/img/suv.png" },
    { cab: "PRIME SUV", images: "/assets/img/Suv2.png" },
];

  return (
    <section id="top-cab-routes" className="bg-inner">
      <div className="container">
        <div id="for-md-to-lg-devices" className="mb-4">
          <h1 className="mb-4">Top Cab Routes from Delhi</h1>

          <div className="d-flex align-items-center">
            <div className="d-flex flex-column pr-2">
              <p className="mb-1">Select type</p>
              <p>To update price, included kms & extra fare</p>
            </div>

            <ul className="d-flex">
              {cabTypeData.map((carType) => (
                <li key={carType} onClick={() => handleCarTypeClick(carType)}>
                  <span
                    className={`cabTap ${
                      activeCarType === carType && "activeCheck"
                    }`}
                  ></span>
                  <span>
                    <img
                      className={activeCarType === carType && "active-car-type"}
                      src={carType.images}
                      alt={carType}
                    />
                  </span>
                  <span className="mx-md-3 font-weight-bolder">
                    {carType.toUpperCase()}
                  </span>
                  <span
                    className={`circle-outer ${
                      activeCarType === carType && "circle-outer-active"
                    }`}
                  >
                    <span
                      className={activeCarType === carType && "circle-inner"}
                    ></span>
                  </span>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="bg-white p-3 pt-lg-0 px-lg-0 best-box-shadow">
          <div id="for-md-sm-devices" className="container">
            <div className="row">
              <div className="col">
                <h1 className="mb-1">Top Cab Routes from Delhi</h1>
              </div>
            </div>
            <div className="row">
              <div className="col">
                <p>Select type to update price, included kms & extra fare</p>
              </div>
            </div>
            <div className="row border-bottom border-info">
              {["sedan", "suv", "hatchback"].map((carType) => (
                <div
                  key={carType}
                  className={`col d-flex flex-column align-items-center ${
                    activeCarType === carType && "active-bottom-border"
                  }`}
                  onClick={() => handleCarTypeClick(carType)}
                >
                  <img
                    className={`img-fluid ${
                      activeCarType === carType && "active-car-type"
                    }`}
                    src={`/assets/images/${
                      carType.charAt(0).toUpperCase() + carType.slice(1)
                    }.png`}
                    alt={carType}
                  />
                  <span className="my-2">{carType.toUpperCase()}</span>
                </div>
              ))}
            </div>
          </div>

          <div className="table-responsive">
            <table className="table">
              <thead>
                <tr style={{ backgroundColor: "#fafafa" }}>
                  <th className="p-4">Cabs from Delhi</th>
                  <th className="p-4">Included kms & Extra fare</th>
                  <th className="p-4">Cab Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td className="">
                    <p>Delhi to Vrindavan Cabs </p>{" "}
                    <p>129 kms | 2 hr 27 min(appx.)</p>
                  </td>
                  <td className="px-3">
                    <p>129 kms included</p>{" "}
                    <p>Extra fare ₹13/km after 129 kms</p>
                  </td>
                  <td className="">
                    <p>₹1316</p> <p>+ ₹716 (Taxes & Charges)</p>
                  </td>
                </tr>

                <tr>
                  <td className="">
                    <p>Delhi to Vrindavan Cabs </p>{" "}
                    <p>129 kms | 2 hr 27 min(appx.)</p>
                  </td>
                  <td className="px-3">
                    <p>129 kms included</p>{" "}
                    <p>Extra fare ₹13/km after 129 kms</p>
                  </td>
                  <td className="">
                    <p>₹1316</p> <p>+ ₹716 (Taxes & Charges)</p>
                  </td>
                </tr>

                <tr>
                  <td className="">
                    <p>Delhi to Vrindavan Cabs </p>{" "}
                    <p>129 kms | 2 hr 27 min(appx.)</p>
                  </td>
                  <td className="px-3">
                    <p>129 kms included</p>{" "}
                    <p>Extra fare ₹13/km after 129 kms</p>
                  </td>
                  <td className="">
                    <p>₹1316</p> <p>+ ₹716 (Taxes & Charges)</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  );
}

export default CabOptions;
