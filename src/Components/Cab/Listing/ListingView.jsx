import { useCallback, useEffect, useState } from "react";
import CabListProducts from "./CabListProducts";
import SidebarFilter from "./ListingSidebarFilter";

function ListingView({data}) {
  
  // const [filteredMenu, setFilteredMenu] = useState(data);

  // const getCategories = useCallback((data) => {
  //   setFilteredMenu(data);
  // }, []);

 

  return (
    <section className="xs-section bg-inner">
      <div className="container">
        <div className="row">
          
          
            <>
            <div className={"col-lg-3"}>
              {/* <Filters value={value} type={type} setShowFilter={setShowSidebar} showFilter={showSidebar}  /> */}
            </div>
            </>
          
          <div className={"col-lg-9 ratio3_2 "}>
            {/* {!latestFilter &&<a href="#javascript" className="mobile-filter border-top-0" onClick={()=>setShowSidebar(!showSidebar)}> */}
            <h5>latest filter</h5>
            <img src="/assets/images/icon/adjust.png" className="img-fluid blur-up lazyloaded" alt="" />
            {/* </a>} */}
            {/* <GridLayout grid={grid} value={filteredMenu} type={type} view={view} trip={trip} /> */}
          </div>
        </div>
      </div>
    </section>
  );
}

export default ListingView;
