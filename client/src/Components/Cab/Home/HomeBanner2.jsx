import React from 'react'
import "./HomeBanner2.css"
import CabSearch2 from "./CabSearch/CabSearch2.jsx";

function HomeBanner2({
    activeTab,
    callback,
    handlePopupClose,
    pathParams,
    setStartDate,
    setReturnDate,
    setStartTime,
    setReturnTime,
    setSelectedValue,
    setSource,
    setDestination,
    setRentals
  }) {
    return (
        <div> <CabSearch2
            source={pathParams.source}
            destination={pathParams.destination}
            setSource={setSource}
            setDestination={setDestination}
            selectedValue={pathParams.selectedValue}
            setSelectedValue={setSelectedValue}
            startDate={pathParams.startDate}
            setStartDate={setStartDate}
            returnDate={pathParams.returnDate}
            setReturnDate={setReturnDate}
            setStartTime={setStartTime}
            setReturnTime={setReturnTime}
            setRentals={setRentals}
            handlePopupClose={handlePopupClose}
        /></div>
    )
}

export default HomeBanner2