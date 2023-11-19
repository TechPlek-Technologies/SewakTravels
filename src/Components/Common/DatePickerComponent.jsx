import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

const DatePickerComponent = ({start,setStart}) => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);


  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={start}
      onChange={(date) => setStart(date)}
      id="datepicker"
      className="datepicker-main"
      dateFormat="dd MMMM"
      placeholderText="Pickup Date"
    />
  );
};

export default DatePickerComponent;
