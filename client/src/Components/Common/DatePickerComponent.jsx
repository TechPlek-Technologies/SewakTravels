import { useContext, useState } from "react";
import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { AppContext } from "../../Context/JourneyContext";

const DatePickerComponent = () => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const { journeyData} = useContext(AppContext);
  const [startDate, setStartDate] = useState(new Date(journeyData?.pickupDate));

  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={startDate||tomorrow}
      onChange={(date) => setStartDate(date)}
      id="datepicker"
      className="datepicker-main"
      dateFormat="dd-MM-yyyy"
      placeholderText="Pickup Date"
    />
  );
};

export default DatePickerComponent;
