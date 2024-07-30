import React from "react";
import { Link } from "react-router-dom";

const CabGrid = ({ data ,grid}) => {
  return (
    <div className={`${grid.gridSize === 3 && "col-xl-4"} col-sm-6 popular grid-item wow fadeInUp`} >
      <div className="special-box cab-box">
        <div className="special-img">
          <a href="#">
            <img src={data?.gridImg} className="img-fluid" alt="" />
          </a>
        </div>
        <div className="special-content">
          <a href="#">
            <h5>{data?.name}</h5>
          </a>
          <ul>
            {data.description.map((desc, index) => (
              <li key={index}>
                <span>{Object.values(desc)[0]}</span>
              </li>
            ))}
          </ul>
          <div className="button-botton">
            {/* <Link href="/cab/single-detail" className="btn btn-solid color1">
              details
            </Link> */}
            <Link to="/contact" className="btn btn-lower btn-curve">
              book now
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CabGrid;
