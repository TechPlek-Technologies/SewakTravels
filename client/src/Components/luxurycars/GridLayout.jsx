import React from "react";
import CabGrid from "./CabGrid";

const GridLayout = ({filteredMenu, view,grid }) => {
  
  return (
    <div className={`product-wrapper-grid special-section grid-box`}>
      <div className={`row content`}>
        {filteredMenu.map((item,index) => (
          <CabGrid data={item} view={view} grid={grid} key={index}/>
        ))}
      </div>
    </div>
  );
};

export default GridLayout;
