import { Fragment } from "react";
import { useState } from "react";
import { Nav, NavItem, NavLink } from "reactstrap";
import { Booking, BookingSvg,HotelSvg } from "../../../../Data/Svg";

function SearchTabs({ callbackActive, svg }) {
  const [activeTab, setActiveTab] = useState("1");
  return (
    <Fragment>
      <Nav
        tabs
        className="nav mix-pills nav-pills mb-3"
        id="top-tab"
        role="tablist"
      >
        <NavItem>
          <NavLink
            className={activeTab === "1" ? "active" : ""}
            onClick={() => {
              setActiveTab("1");
              callbackActive("1");
            }}
          >
       
            {/* <CarSvg height={"25px"}/> */}
            {<BookingSvg height={"25px"}/>}
            <h6>Cabs</h6>
            
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={activeTab === "2" ? "active" : ""}
            onClick={() => {
              setActiveTab("2");
              callbackActive("2");
            }}
          >
            {
              <img
              className={activeTab === "2" ? "active" : ""}
              src="assets/svg/flght2.svg"
              height={"25px"}
              alt=""
              />
            }
            <h6>Flight</h6>

          </NavLink>
          <div className="material-border"></div>
        </NavItem>
        <NavItem>
          <NavLink
            className={activeTab === "3" ? "active" : ""}
            onClick={() => {
              setActiveTab("3");
              callbackActive("3");
            }}
          >
            {/* {
              <img
                className={activeTab === "3" ? "activetab" : ""}
                src="assets/svg/Hotel.svg"
                height={"35px"}
              />
            } */}
            <HotelSvg height={"25px"} />

            <h6>Hotel</h6>

          </NavLink>
          <div className="material-border"></div>
        </NavItem>
        <NavItem>
          <NavLink
            className={activeTab === "4" ? "active" : ""}
            onClick={() => {
              setActiveTab("4");
              callbackActive("4");
            }}
          >
            {/* {
              <img
                className={activeTab === "4" ? "activetab" : ""}
                src="assets/svg/tour.svg"
                height={"35px"}
              />
            } */}
            <Booking  height={"25px"} />
            <h6>Tour</h6>
          </NavLink>
          <div className="material-border"></div>
        </NavItem>
      </Nav>
    </Fragment>
  );
}
export default SearchTabs;
