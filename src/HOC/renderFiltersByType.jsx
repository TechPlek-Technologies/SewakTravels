import { MemorizedCabCapacityFilter } from "../Components/Cab/Listing/Filters/CabCapacity";
import { MemorizedCabOptionFilter } from "../Components/Cab/Listing/Filters/CabOption";
import { MemorizedCabTypeFilter } from "../Components/Cab/Listing/Filters/CabType";

function renderFiltersByType() {
  return (
    <>
      <MemorizedCabTypeFilter />
      <MemorizedCabOptionFilter />
      <MemorizedCabCapacityFilter />
    </>
  );
}

export default renderFiltersByType;
