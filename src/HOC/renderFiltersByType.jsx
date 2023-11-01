import { MemorizedCabCapacityFilter } from "../Components/Cab/Listing/Filters/CabCapacity";
import { MemorizedCabOptionFilter } from "../Components/Cab/Listing/Filters/CabOption";
import CabType from "../Components/Cab/Listing/Filters/CabType";

function renderFiltersByType() {
  return (
    <>
      <CabType />
      <MemorizedCabOptionFilter />
      <MemorizedCabCapacityFilter />
    </>
  );
}

export default renderFiltersByType;
