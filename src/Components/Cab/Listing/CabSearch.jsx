import { Link } from "react-router-dom";
import DatePickerComponent from "../../Common/DatePickerComponent";
import Img from "../../Common/Img";
import { useState } from "react";
import TimePickerComponent from "../../Common/TimePickerComponent";

const CabSearch = ({ resClass,setSearchBarOpen, searchBarOpen }) => {
    const [startDate, setStartDate] = useState(new Date());
    return (
      <div className="flight-search">
        <div className={`flight-search-detail ${searchBarOpen?"show":""} ${resClass ? resClass : ''}`}>
          <form className="row m-0" >
            <div className="col">
              <div className="form-group">
                <label className="font-xs-white">Pickup Location</label>
                <input type="text" className="form-control open-select" id="exampleInputEmail1" placeholder="pick up" />
                <Img src="/assets/images/icon/from.png" className="img-fluid " alt="" />
              </div>
            </div>
            <div className="col">
              <div className="form-group">
                <label className="font-xs-white">Drop off Location</label>
                <input type="text" className="form-control open-select" placeholder="drop off" />
                <Img src="/assets/images/icon/location.png" className="img-fluid " alt="" />
              </div>
            </div>
            <div className="col">
              <div className="form-group">
                <label className="font-xs-white">Pickup Date</label>
                <div className="input-group">
                <DatePickerComponent setStart={setStartDate} />
                </div>
              </div>
            </div>
            <div id="dropdate" className="col">
              <div className="form-group">
                <label className="font-xs-white">Pickup Time</label>
                <div className="input-group">
                {/* <DatePickerComponent setStart={setStartDate} start={startDate} />
                 */}
                 <TimePickerComponent/>
                </div>
              </div>
            </div>
            <div className="col search-col">
              <div className="search-btn">
                <Link href="/cab/listing/list-view/left-sidebar" className="btn btn-solid color1">
                  {"Search"}
                </Link>
              </div>
            </div>
            <div className="responsive-close" onClick={()=>setSearchBarOpen&&setSearchBarOpen(!searchBarOpen)}>
                <i className="far fa-times-circle" />
            </div>
          </form>
        </div>
      </div>
    );
  };
  
  export default CabSearch;