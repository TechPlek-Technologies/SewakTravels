import { useContext, useCallback, useEffect, useRef, useState } from "react";
import { TimepickerUI } from "timepicker-ui";
import { AppContext } from "../../Context/JourneyContext";

function TimePickerComponent() {
  const { journeyData, setJourneyData } = useContext(AppContext); // Correct the typo here
  const tmRef = useRef(null);
  const [inputValue, setInputValue] = useState(journeyData.pickupTime || "12:00 PM"); // Set initial value from journeyData

  const testHandler = useCallback(({ detail: { hour, minutes, type } }) => {
    const newTime = `${hour}:${minutes} ${type}`;
    setInputValue(newTime);

    // Update the time in the context
    setJourneyData((prevData) => ({
      ...prevData,
      pickupTime: newTime,
    }));
  }, [setJourneyData]);

  useEffect(() => {
    if (inputValue === "10:00 PM") {
      alert("You selected 10:00 PM");
    }
  }, [inputValue]);

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
