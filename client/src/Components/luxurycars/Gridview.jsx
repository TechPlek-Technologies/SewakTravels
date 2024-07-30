import React, { useCallback, useState } from 'react'
import GridLayout from './GridLayout'
import Category from './Category';

const Gridview = ({topFilter,gridOption, trip, side, value, children, type, view,latestFilter}) => {
    const [showDropDown, setShowDropDown] = useState(false);
    const [showSidebar, setShowSidebar] = useState(false);
    const [filteredMenu, setFilteredMenu] = useState(value);
    const getCategories = useCallback((data) => {
        setFilteredMenu(data);
      }, []);
     
      const grid = {
        "gridSize": 3,
        "gridStyle": "grid-view",
        "toPage": 1,
        "totalPages": 1,
        "productCount": 7
    }
  return (
    <section className="xs-section bg-inner">
    <div className="container">
      <div className="row">
        {topFilter && type === "flight" ? (
          <div className="col-12">
            {" "}
          </div>
        ) : gridOption ? (
          <div className="col-12">
            <div className="filter-panel">
              <div className="left-filter">
                <div className="respon-filter-btn">
                  <h6 onClick={()=>setShowDropDown(!showDropDown)}>filter <i className="fas fa-sort-down"></i></h6>
                  <span className="according-menu"></span>
                </div>
                <div className={`filters respon-filter-content filter-button-group ${showDropDown ?" show":""} `}>
                    <Category value={value} getCategories={getCategories} />
                </div>
               
              </div>
            </div>
          </div>
        ) : (
          ""
        )}
        {children}
        <div className={`${topFilter ? "col-lg-12" : side === "no" ? "col-lg-12" : "col-lg-9"} ratio3_2 `}>
          {!latestFilter &&<a href="#javascript" className="mobile-filter border-top-0" onClick={()=>setShowSidebar(!showSidebar)}>
          <h5>latest filter</h5>
          <img src="/assets/images/icon/adjust.png" className="img-fluid blur-up lazyloaded" alt="" />
          </a>}
          <GridLayout filteredMenu={filteredMenu} type={type} grid={grid} view={view} trip={trip} />
        </div>
      </div>
    </div>
  </section>
  )
}

export default Gridview
