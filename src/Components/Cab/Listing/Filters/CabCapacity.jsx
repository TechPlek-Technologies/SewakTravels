import { memo } from "react";
import { useState } from "react";
import { capacityData } from "../../../../Data/CabData";

function CabCapacity(){
  const [show, setShow] = useState(true);

    return (
      <div
      className="filter-block"
      onClick={() => {
        setShow(!show);
      }}>
      <div className={`collection-collapse-block ${show ? "open" : ""}`}>
        <h6 className="collapse-block-title">Cab Capacity</h6>
        <div className={`collection-collapse-block-content ${!show ? "d-none" : ""} `}>
          <div className="collection-brand-filter">
            {capacityData.map((data,index) => {
              return (
                <div className="form-check collection-filter-checkbox" key={index}>
                  <input type="checkbox" className="form-check-input" id={data.type} value={data.type}  />
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

export const MemorizedCabCapacityFilter=memo(CabCapacity);