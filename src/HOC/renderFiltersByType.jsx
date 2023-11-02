// import { MemorizedCabCapacityFilter } from "../Components/Cab/Listing/Filters/CabCapacity";
// import { MemorizedCabOptionFilter } from "../Components/Cab/Listing/Filters/CabOption";
import CabType from "../Components/Cab/Listing/Filters/CabType";

function renderFiltersByType(setFilteredData) {
  return (
    <>
      <CabType setFilteredData={setFilteredData}/>
      {/* <MemorizedCabOptionFilter /> */}
      {/* <MemorizedCabCapacityFilter /> */}
    </>
  );
}

export default renderFiltersByType;
