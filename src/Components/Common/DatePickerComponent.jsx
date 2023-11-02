import { useContext } from "react";
import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { AppContext } from "../../Context/JourneyContext";

const DatePickerComponent = ({ setStart}) => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const { journeyData} = useContext(AppContext);

  const start=journeyData?.pickupDate
  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={start}
      onChange={(date) => setStart(date)}
      id="datepicker"
      className="datepicker-main"
      dateFormat="dd-MM-yyyy"
      placeholderText="Pickup Date"
    />
  );
};

export default DatePickerComponent;
