import { Link } from "react-router-dom";
import DatePickerComponent from "../Common/DatePickerComponent";
import Img from "../Common/Img";
import TimePickerComponent from "../Common/TimePickerComponent";
import { useState } from "react";

function CabBookingForm(){
    const [startDate, setStartDate] = useState(new Date());
    return (
      <>
        <form onSubmit={(event)=>event.preventDefault()}>
          <div className="form-group">
            <label>{"Pick Up"}</label>
            <input type="text" className="form-control open-select" id="exampleInputEmail1" placeholder="pick up" />
            <Img src="/assets/images/icon/from.png" className="img-fluid " alt="" />
          </div>
          <div className="form-group">
            <label>{"Drop Off"}</label>
            <input type="text" className="form-control open-select" placeholder="drop off" />
            <Img src="/assets/images/icon/location.png" className="img-fluid" alt="" />
          </div>
          <div className="form-group">
            <label>{"Pick Up Date"}</label>
            <div className="form-control">
              <DatePickerComponent start={startDate} setStart={setStartDate} />
            </div>
          </div>
          <div className="form-group">
            <label>{"Pick Up Time"}</label>
            <TimePickerComponent />
          </div>
          
          <div className="search-btn">
            <Link href="/cab/booking" className="btn btn-solid color1">book now</Link>
          </div>
        </form>
      </>
    );
  };
  
  export default CabBookingForm;