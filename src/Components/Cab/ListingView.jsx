import { useCallback, useEffect, useState } from "react";
import CabListProducts from "./CabListProducts";
import SidebarFilter from "./SidebarFilter";

function ListingView({data}) {
  
  const [filteredMenu, setFilteredMenu] = useState(data);

  const getCategories = useCallback((data) => {
    setFilteredMenu(data);
  }, []);

 

  return (
    <section class="pt-0 bg-inner small-section">
      <div class="container">
        <div class="row">
          <SidebarFilter />
          <div class="col-lg-9">
            <CabListProducts data={filteredMenu} />
          </div>
        </div>
      </div>
    </section>
  );
}

export default ListingView;
