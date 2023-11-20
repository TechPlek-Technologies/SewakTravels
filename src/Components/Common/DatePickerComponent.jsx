import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

const DatePickerComponent = ({startDate,setStartDate}) => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);


  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={startDate}
      onChange={(date) => setStartDate(new Date(date.setUTCHours(0, 0, 0, 0)))}
      id="datepicker"
      className="datepicker-main"
      dateFormat="dd MMMM"
      placeholderText="Select Date"
    />
  );
};

export default DatePickerComponent;
