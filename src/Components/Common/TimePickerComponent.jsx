import { useCallback, useEffect, useRef, useState } from "react";
import { TimepickerUI } from "timepicker-ui";
import OutstationDataState from "../../Hooks/OutstationDataState";

function TimePickerComponent({ updateTimeCallback }) {
  const tmRef = useRef(null);
  const [inputValue, setInputValue] = useState("12:00 PM"); // Set initial value from journeyData

  const {
    setStartTime,
    destination,
    startDate,
    returnDate,
    setStartDate,
    setReturnDate,
    setTime,
    sourceInputRef,
    destinationInputRef,
  } = OutstationDataState();
  const testHandler = useCallback(({ detail: { hour, minutes, type } }) => {
    const newTime = `${hour}:${minutes} ${type}`;
    setInputValue(newTime);

    // Update the time in the context or state
    if (updateTimeCallback) {
      updateTimeCallback(newTime);
    }
  }, [updateTimeCallback]);

  useEffect(() => {
    const tm = tmRef.current;
    const newPicker = new TimepickerUI(tm, {});
    newPicker.create();
    tm.addEventListener("accept", testHandler);

    return () => {
      tm.removeEventListener("accept", testHandler);
    };
  }, [testHandler]);

  return (
    <div className="timepicker-ui" ref={tmRef}>
      <input
        type="text"
        className="timepicker-ui-input form-control"
        defaultValue={inputValue} // Use inputValue as the defaultValue
      />
    </div>
  );
}

export default TimePickerComponent;
