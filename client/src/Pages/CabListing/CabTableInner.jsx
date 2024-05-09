import React from "react";
import { Link } from "react-router-dom";

const CabTableInner = ({ type }) => {
  const data = [
    {
      id: 1,
      title: "Delhi to Vrindavan Cabs",
      km: "129",
      hour: "2 hr 27 min",
      extrafare: "₹13",
      price: "₹1316",
      taxes: "₹716",
      source:"Delhi, India",
      destination:"Vrindavan, Uttar Pradesh, India",
    },
    {
      id: 2,
      title: "Delhi to Vrindavan Cabs",
      km: "129",
      hour: "2 hr 27 min",
      extrafare: "₹13",
      price: "₹1316",
      taxes: "₹716",
      source:"Delhi, India",
      destination:"Vrindavan, Uttar Pradesh, India",
    },
    {
      id: 3,
      title: "Delhi to Vrindavan Cabs",
      km: "129",
      hour: "2 hr 27 min",
      extrafare: "₹13",
      price: "₹1316",
      taxes: "₹716",
      source:"Delhi, India",
      destination:"Vrindavan, Uttar Pradesh, India",
    },
  ];
  return data.map((item) => (
    <tr key={item?.id}>
      <td className="">
        <p>{item?.title} </p>{" "}
        <p>
          {item?.km} kms | {item?.hour}(appx.)
        </p>
      </td>
      <td className="px-3">
        <p>{item?.km} kms included</p>{" "}
        <p>
          Extra fare {item?.extrafare}/km after {item?.km} kms
        </p>
      </td>
      <td className="">
        <p>{item?.price}</p>
      </td>
      <td><div className="cabTypeCol"><Link className="viewCabBtn"> VIEW CABS</Link></div></td>
    </tr>
  ));
};

export default CabTableInner;