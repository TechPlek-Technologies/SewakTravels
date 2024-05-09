import React, { useState } from "react";
import { Link } from "react-router-dom";
import "./RentalSection.css";
import AirlineSeatReclineExtraIcon from "@mui/icons-material/AirlineSeatReclineExtra";
import LuggageIcon from "@mui/icons-material/Luggage";
import AcUnitIcon from "@mui/icons-material/AcUnit";

function RentalSection({ destination }) {
  function getFirstWord(str) {
    // Split the string into an array of words
    let words = str?.split(", ");
    // Return the first word (if it exists)
    if (words?.length > 0) {
      return words[0];
    } else {
      return words; // Return an empty string if the input string is empty
    }
  }

  const destination1 = getFirstWord(destination);

  const DataList = [
    {
      image: "/assets/img/hatchback.png",
      carName: "indica, swift",
      carType: "Hatchback",
      seat: 4,
      bag: 1,
      AC: "AC",
      price: 222,
    },
    {
      image: "/assets/img/hatchback.png",
      carName: "xylo, Ertiga",
      carType: "SUV",
      seat: 6,
      bag: 2,
      AC: "AC",
      price: 333,
    },
    {
      image: "/assets/img/hatchback.png",
      carName: "Tata tigor",
      carType: "Sedan",
      seat: 4,
      bag: 3,
      AC: "AC",
      price: 555,
    },
  ];

  return (
    <section id="src-to-des-rentalCabs" className="bg-inner cab-route-mrgn">
      <div className="container">
        <div id="for-md-to-lg-devices" className="mb-4">
          <h1 className="mb-4">Delhi to {destination1} Rental Cabs</h1>

          <div className="d-flex align-items-center">
            <div className="d-flex flex-column pr-2 pr-lg-5 mr-lg-5">
              <p className="mb-1">Select package</p>
              <p>Basis duration & kms</p>
            </div>

            <ul className="d-flex">
              <li className="d-flex align-items-center justify-content-center">
                4 hr 40 kms
              </li>
              <li className="d-flex align-items-center justify-content-center">
                8 hr 80 kms
              </li>
            </ul>
          </div>
        </div>

        <div className="bg-white p-3 pt-lg-0 px-lg-0 best-box-shadow">
          <div id="for-md-sm-devices" className="container px-0 mb-4">
            <h1 className="mb-3">Delhi to {destination1} Rental Cabs</h1>
            <div>
              <p>Select package</p>
              <p>Basis duration & kms</p>
            </div>
            <div className="overflow-auto">
              <ul className="d-flex">
                <li className="d-flex align-items-center justify-content-center">
                  4 hr 40 kms
                </li>
                <li className="d-flex align-items-center justify-content-center">
                  8 hr 80 kms
                </li>
              </ul>
            </div>
          </div>

          <div className="table-responsive">
            <table className="table">
              <thead>
                <tr>
                  <th className="p-2 border-top-0 p-lg-4">Cab Types</th>
                  <th className="p-2 border-top-0 p-lg-4 text-lg-center">
                    Seats & bags
                  </th>
                  <th className="p-2 text-end border-top-0 p-lg-4">Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                {DataList.map((data) => {
                  return (
                    <tr className="">
                      <td className="px-2 py-3 align-middle">
                        <div className="d-flex align-items-center">
                          <img
                            className="mr-lg-4"
                            src="/assets/img/hatchback.png"
                            width="75"
                            alt=""
                          />
                          <div className="">
                            <p className="">{data.carName}</p>
                            <p className="mb-0">{data.carType}</p>
                          </div>
                        </div>
                      </td>
                      <td className="px-2 py-3 align-middle">
                        <div className="d-flex align-items-center justify-content-lg-center">
                          <div className="d-lg-flex mr-lg-4">
                            <AirlineSeatReclineExtraIcon className="mr-lg-1" />
                            <p className="mb-lg-0"> {data.seat} Seats</p>
                          </div>
                          <div className="d-lg-flex mr-lg-4">
                            <LuggageIcon className="mr-lg-1" />
                            <p className="mb-lg-0">{data.bag} Bag(s)</p>
                          </div>
                          <div className="d-lg-flex mr-lg-4">
                            <AcUnitIcon className="mr-lg-1" />
                            <p className="mb-lg-0">{data.AC}</p>
                          </div>
                        </div>

                        <p className="d-lg-none">
                          {" "}
                          {data.seat}Seats | {data.bag}Bag(s) | {data.AC}
                        </p>
                      </td>
                      <td className='px-2 py-3 text-end align-middle'>
                                    <div>
                                        <p>₹{data.price}</p>
                                    </div>
                                </td>
                      <td className="align-middle">
                        <Link>Book Cab</Link>
                      </td>
                    </tr>
                  );
                })}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  );
}

export default RentalSection;
