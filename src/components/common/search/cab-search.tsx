import { Search } from "@/constant/constant";
import DateTimePickerComp from "../date-time-picker";
import Img from "@/utils/BackgroundImageRatio";
import Link from 'next/link';
import { FC, useContext} from "react";
import { CabContext } from "@/context/CabContext";

interface ICabSearchProps {
  resClass?: string;
  setSearchBarOpen?:(val:boolean)=>void
  searchBarOpen?:boolean

}
const CabSearch: FC<ICabSearchProps> = ({ resClass,setSearchBarOpen, searchBarOpen }) => {

  const context = useContext(CabContext);
  
    
    // Retrieve the data from local storage
    const storedContextData = localStorage.getItem('cabContextData');

    const drop=storedContextData ? JSON.parse(storedContextData).dropLocation : "Drop";
    const pick=storedContextData ? JSON.parse(storedContextData).pickupLocation : "Pick up"

    context?.setPickupLocation(pick);
    context?.setDropLocation(drop);
    console.log(context);

    
    
  
  return (
    <div className="flight-search">
      <div className={`flight-search-detail ${searchBarOpen?"show":""} ${resClass ? resClass : ''}`}>
        <form className="row m-0" >
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Pick Up</label>
              <input type="text" className="form-control open-select" id="exampleInputEmail1" placeholder="pick up" value={pick} />
              <Img src="/assets/images/icon/from.png" className="img-fluid " alt="" />
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">Drop off</label>
              <input type="text" className="form-control open-select" placeholder="drop off" value={drop} />
              <Img src="/assets/images/icon/location.png" className="img-fluid " alt="" />
            </div>
          </div>
          <div className="col">
            <div className="form-group">
              <label className="font-xs-white">pick up</label>
              <div className="input-group">
              <DateTimePickerComp />
              </div>
            </div>
          </div>
          <div id="dropdate" className="col">
            <div className="form-group">
              <label className="font-xs-white">drop off</label>
              <div className="input-group">
              <DateTimePickerComp />
              </div>
            </div>
          </div>
          <div className="col search-col">
            <div className="search-btn">
              <Link href="/cab/listing/list-view/left-sidebar" className="btn btn-solid color1">
                {Search}
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
