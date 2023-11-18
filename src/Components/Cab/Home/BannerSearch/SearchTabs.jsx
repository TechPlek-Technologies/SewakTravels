import { Fragment } from "react";
import { useState } from "react";
import { Nav, NavItem, NavLink } from "reactstrap";

function SearchTabs({ callbackActive, svg }) {
    const [activeTab, setActiveTab] = useState("1");
    return (
      <Fragment>
        <Nav tabs className="nav mix-pills nav-pills mb-3" id="top-tab" role="tablist">
          <NavItem>
            <NavLink
              className={activeTab === "1" ? "active" : ""}
              onClick={() => {
                setActiveTab("1");
                callbackActive("1");
              }}>
              {svg}
              Cabs
            </NavLink>
            <div className="material-border"></div>
          </NavItem>
          <NavItem>
            <NavLink
              className={activeTab === "2" ? "active" : ""}
              onClick={() => {
                setActiveTab("2");
                callbackActive("2");
              }}>
              {svg }
              Flight
            </NavLink>
            <div className="material-border"></div>
          </NavItem>
          <NavItem>
            <NavLink
              className={activeTab === "3" ? "active" : ""}
              onClick={() => {
                setActiveTab("3");
                callbackActive("3");
              }}>
              {svg}
              Hotel
            </NavLink>
            <div className="material-border"></div>
          </NavItem>
          <NavItem>
            <NavLink
              className={activeTab === "4" ? "active" : ""}
              onClick={() => {
                setActiveTab("4");
                callbackActive("4");
              }}>
              {svg}
              Tour
            </NavLink>
            <div className="material-border"></div>
          </NavItem>
         
        </Nav>
      </Fragment>
    );
  };
  export default SearchTabs;
  