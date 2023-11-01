import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

const DatePickerComponent = ({ setStart, start }) => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={start ? start : null}
      onChange={(date) => setStart(date)}
      id="datepicker"
      className="datepicker-main"
      dateFormat="dd-MM-yyyy"
      placeholderText="Pickup Date"
    />
  );
};

export default DatePickerComponent;
