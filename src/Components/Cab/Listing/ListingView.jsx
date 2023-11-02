import React, { useEffect, useState } from "react";
import Filters from "./Filters";
import ProductLayout from "./ProductLayout";

function ListingView({ data }) {
  const [filteredData, setFilteredData] = useState(data);
  const [showSidebar, setShowSidebar] = useState(false);
console.log("hee")
console.log(filteredData)
  

  return (
    <section className="xs-section bg-inner">
      <div className="container">
        <div className="row">
          <div className={`col-lg-3`}>
            <Filters
              showFilter={showSidebar}
              setShowFilter={setShowSidebar}
              setFilteredData={setFilteredData}
              filteredData={filteredData}
            />
          </div>

          <div className={`col-lg-9 ratio3_2`}>
            <a
              href="#javascript"
              className="mobile-filter border-top-0"
              onClick={() => setShowSidebar(!showSidebar)}
            >
              <h5>latest filter</h5>
              <img
                src="/assets/images/icon/adjust.png"
                className="img-fluid blur-up lazyloaded"
                alt=""
              />
            </a>
            <ProductLayout value={filteredData} />
          </div>
        </div>
      </div>
    </section>
  );
}

export default ListingView;
