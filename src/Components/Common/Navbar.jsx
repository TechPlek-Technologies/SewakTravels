import React, { useState } from "react";
import { NavLink } from "react-router-dom";

function Navbar() {
  const [toggleSideBar, setToggleSideBar] = useState(false);

  const paths = [
    {
      path: "/",
      title: "Home",
    },
    {
      path: "/about",
      title: "About Us",
    },
    {
      path:"/service",
      title:"Services"
    },
    {
      path: "/blogs",
      title: "Blogs",
    },
    {
      path: "/contact",
      title: "Contact",
    },
    {
      path: "/FAQ",
      title: "FAQ",
    }
  ];

  return (
    <div className="menu">
      <nav>
        <div className="main-navbar">
          <div id="main-nav">
            <div className="toggle-nav">
              <i
                className="fa fa-bars sidebar-bar"
                onClick={() => setToggleSideBar(!toggleSideBar)}
              ></i>
            </div>
            <div
              className={`menu-overlay ${toggleSideBar ? "show" : ""}`}
            ></div>
            <ul
              className="nav-menu"
              style={{ right: toggleSideBar ? "0px" : "" }}
            >
              <li className="back-btn" >
                <div
                  className="mobile-back text-end"
                  onClick={() => setToggleSideBar(!toggleSideBar)}
                >
                  <span>Back</span>
                  <i aria-hidden="true" className="fa fa-angle-right ps-2"></i>
                </div>
              </li>

              {paths.map((link) => (
                <li  key={link.path}>
                  <NavLink to={link.path}>
                    {link.title}
                  </NavLink>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </nav>
      </div>
  );
}

export default Navbar;
