import { useState } from "react";
import useOutsideDropdown from "../../../../Utility/useOutsideDropdown";
import QtyBox from "./QtyBox";
import FlightClass from "./FlightClass";

const SelectTraveler= () => {
    const { ref, isComponentVisible, setIsComponentVisible } = useOutsideDropdown(false);
    const [selectedCity, setSelectedCity] = useState("");
    return (
      <div className="form-group selectTraveller">
        <input type="text" className="form-control open-select" placeholder="Traveler" value={selectedCity} onClick={() => setIsComponentVisible(!isComponentVisible)} />
        <div ref={ref} className={`selector-box-flight ${isComponentVisible ? "show" : ""}`}>
          <QtyBox />
          <FlightClass />
          <div className="bottom-part">
            <span className="btn border-0">apply</span>
          </div>
        </div>
      </div>
    );
  };
  
  export default SelectTraveler;