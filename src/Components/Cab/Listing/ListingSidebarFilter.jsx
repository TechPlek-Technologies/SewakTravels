import { useState } from "react";

function ListingSidebarFilter() {
  const [show, setShow] = useState(false);

  return (
    <div className="left-sidebar" style={{left:showFilter?"-1px":""}}>
    <div className="back-btn" onClick={()=>setShowFilter &&setShowFilter(!showFilter)}>back</div>
    <div className="search-bar">
      <input type="text" placeholder="Search here.." />
      <i className="fas fa-search"></i>
    </div>
    <div className={`middle-part collection-collapse-block ${show ? "" : "open"}`} >
      
        <>
          <div className="d-flex align-items-center justify-content-between">
            <h5>{LatestFilter}</h5>
            <Img src="/assets/images/icon/adjust.png" className="img-fluid" alt="" onClick={() => setShow(!show)}/>
          </div>
          <div className={`collection-collapse-block-content ${ show ? "hide-content" : ""}`} >{renderFiltersByType(type, minPrice, maxPrice)}</div>
        </>
      
    </div>
  </div>
  );
}

export default ListingSidebarFilter;
