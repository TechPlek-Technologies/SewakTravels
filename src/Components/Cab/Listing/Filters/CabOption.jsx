import { memo } from "react";
import { useState } from "react";
import { carOptionData } from "../../../../Data/CabData";

function CabOption(){
  const [show, setShow] = useState(false);

    return (
      <div
      className="filter-block"
      onClick={() => {
        setShow(!show);
      }}>
      <div className={`collection-collapse-block ${show ? "open" : ""}`}>
        <h6 className="collapse-block-title">Cab Type</h6>
        <div className={`collection-collapse-block-content ${!show ? "d-none" : ""} `}>
          <div className="collection-brand-filter">
            {carOptionData.map((data,index) => {
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

export const MemorizedCabTypeFilter=memo(CabOption);
